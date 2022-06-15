shadowOffset = 20;
let blockSnapSize = 30;
let gridH = 7
let gridL = 14
// TODO see why new Cell isnt being recognized
let pseudoGrid = Array(gridH).fill(new Cell("blank", -1, -1, -1)).map(x => Array(gridL).fill(new Cell("blank", -1, -1, -1)));

//let pseudoGrid = Array(gridH).fill(0).map(x => Array(gridL).fill(0));

// double blockSnapSize
let gridSnapSize = blockSnapSize * 2;
let timeout;
let lastTap = 0;
let hideResults = false;
let currentStep = 0;
let gridLinesColor = '#c6c6c6';

let width = Math.round(document.getElementById('canvas-div').clientWidth / gridSnapSize) * gridSnapSize;
let height = Math.round( document.getElementById('canvas-div').clientHeight / gridSnapSize) * gridSnapSize;

console.log("Height: " + height + " | Width: " + width);

/*############################################################################*/
/*####################### Gate Definition ####################################*/
/*############################################################################*/

function newGate(x, y, width, height, layer, stage, filepath, type, createdBy, shapetype = 'rectangle', hidden = false, level = 0) {
  let tempShadowShapeType = 'shadow' + shapetype;

  let shadowRectangle = new Konva.Rect({
    x: x,
    y: y,
    shapeType: tempShadowShapeType,
    type: type,
    id: createdBy,
    createdAtLevel: level,
    width: blockSnapSize * width,
    height: blockSnapSize * height,
    fill: '#FF7B17',
    opacity: 0.6,
    stroke: '#CF6412',
    strokeWidth: 3,
    dash: [20, 2]
  });
  shadowRectangle.hide();
  layer.add(shadowRectangle);

  Konva.Image.fromURL(filepath, function (rectangle) {
    rectangle.setAttrs({
      x: x,
      y: y,
      x_prev: x,
      y_prev: y,
      shapeType: shapetype,
      type: type,
      id: createdBy,
      createdAtLevel: level,
      width: blockSnapSize * width,
      height: blockSnapSize * height,
      shadowColor: 'black',
      shadowBlur: 2,
      shadowOffset: {x : 1, y : 1},
      shadowOpacity: 0.4,
      draggable: true
    });

    rectangle.on('dragstart', (e) => {
      shadowRectangle.show();
      shadowRectangle.moveToTop();
      rectangle.moveToTop();
      rectangle.position({
        x_prev: rectangle.x,
        y_prev: rectangle.y
      });
    });

    rectangle.on('dragend', (e) => {
      rectangle.position({
        x: Math.round(rectangle.x() / gridSnapSize) * gridSnapSize,
        y: Math.round(rectangle.y() / gridSnapSize) * gridSnapSize
      });
      stage.batchDraw();
      shadowRectangle.hide();
    });

    rectangle.on('dragmove', (e) => {
      shadowRectangle.position({
        x: Math.round(rectangle.x() / gridSnapSize) * gridSnapSize,
        y: Math.round(rectangle.y() / gridSnapSize) * gridSnapSize
      });
      stage.batchDraw();
    });

    layer.add(rectangle);

    layer.batchDraw();
    // do something else on right click
    rectangle.on('contextmenu', (e) => {
      rectangle.destroy();
      shadowRectangle.destroy();
      layer.draw();
      if(hidden){
        let color = (type.includes("white")) ? 'white' : 'black';
        newGate(x, y, width, height, layer, stage, 'img/' + color + '.png', type, "simulation", 'circle', false, level);
      }
    });

    rectangle.on('touchend', (e) => {
      let currentTime = new Date().getTime();
      let tapLength = currentTime - lastTap;
      clearTimeout(timeout);
      if (tapLength < 500 && tapLength > 0) {
        rectangle.destroy();
        layer.draw();
        if(hidden){
          let color = (type.includes("white")) ? 'white' : 'black';
          newGate(x, y, width, height, layer, stage, 'img/' + color + '.png', type, "simulation", 'circle', false, level);
        }
      }
      lastTap = currentTime;
    });

    // do something else on right click
    rectangle.on('stop-button', (e) => {
      // rectangle.destroy();
      // layer.draw();
    });
  });
}


/*############################################################################*/
/*####################### Creates Grid #######################################*/
/*############################################################################*/

let stage = new Konva.Stage({
  container: 'canvas',
  width: width,
  height: height
});

let gridLayer = new Konva.Layer();

for (let i = 1; i < width / gridSnapSize; i++) {
  gridLayer.add(new Konva.Line({
    points: [Math.round(i * gridSnapSize) + 0.5, 0, Math.round(i * gridSnapSize) + 0.5, height],
    stroke: gridLinesColor,
    strokeWidth: 1,
  }));
}

gridLayer.add(new Konva.Line({points: [0,0,10,10]}));
for (let j = 1; j < height / gridSnapSize; j++) {
  gridLayer.add(new Konva.Line({
    points: [0, Math.round(j * gridSnapSize), width, Math.round(j * gridSnapSize)],
    stroke: gridLinesColor,
    strokeWidth: 1,
  }));
}

let layer = new Konva.Layer();
stage.add(gridLayer);

// do not show context menu on right click
stage.on('contentContextmenu', (e) => {
  e.evt.preventDefault();
});

gridLayer.draw();

function fitStageIntoParentContainer() {
  let container = document.querySelector('#stage-parent');

// now we need to fit stage into parent
  let containerWidth = document.getElementById('canvas').clientWidth;
// to do this we need to scale the stage
  let scaleX = containerWidth / width;

// now we need to fit stage into parent
  let containerHeight = document.getElementById('canvas').clientHeight;
// to do this we need to scale the stage
  let scaleY = containerHeight / height;

// uncomment to enable "uniform stretch"
//scaleX = scaleY =Math.min(scaleX,scaleY);

  stage.width(width * scaleX);
  stage.height(height * scaleY);
  stage.scale({ x: scaleX, y: scaleY });
  stage.draw();
}

fitStageIntoParentContainer();
// adapt the stage on any window resize
window.addEventListener('resize', fitStageIntoParentContainer);

/*############################################################################*/
/*####################### Drag and Drop ######################################*/
/*############################################################################*/

// what is url of dragging element?
let type = '';
let listOfObjects = ['not', 'cnot', 'white', 'black', 'swap', 'cswap', 'ccswap', 'pete', 'pipe', 'wbmist', 'wnegbmist'];

for (i = 0; i < listOfObjects.length; i++) {
  let obj = listOfObjects[i];
  let id = 'drag-' + obj;
  document.getElementById(id).addEventListener('dragstart', function (e) {
    type = obj;
  });
  id = 'drag-' + obj + '-mobile';
  document.getElementById(id).addEventListener('dragstart', function (e) {
    type = obj;
  });
}

let con = stage.container();
con.addEventListener('dragover', function (e) {
  e.preventDefault(); // !important
});

con.addEventListener('drop', function (e) {
  e.preventDefault();
  // now we need to find pointer position
  // we can't use stage.getPointerPosition() here, because that event
  // is not registered by Konva.Stage
  // we can register it manually:
  stage.setPointersPositions(e);
  console.log("TYPE OF DROP: " + type);
  let x = stage.getPointerPosition().x;
  let y = stage.getPointerPosition().y;
  let gateY = 0;
  let gateX = 0;

  for (let i = 1; i < width / gridSnapSize; i++) {
    let temp = Math.round((x / gridSnapSize) * gridSnapSize) + 0.5
    if((Math.round((i-1) * gridSnapSize) + 0.5) < temp &&
        temp < (Math.round(i * gridSnapSize) + 0.5)){
      gateX = Math.round((i-1) * gridSnapSize) + 0.5;
    }
  }

  for (let j = 1; j < height / gridSnapSize; j++) {
    let temp = Math.round((y / gridSnapSize) * gridSnapSize)
    if((Math.round((j-1) * gridSnapSize)) < temp &&
        temp < (Math.round(j * gridSnapSize))){
      gateY = Math.round((j-1) * gridSnapSize);
    }
  }

  let overlapping = willOverlap(gateX, gateY);

  console.log("gateX: " + gateX + " | gateY: " + gateY + " | overlapping: " + overlapping);

  if(!overlapping) {
    if (type === 'cnot') {
      newGate(gateX, gateY, 4, 2, layer, stage, 'img/cnot.png', 'cnotGate', 'user', 'rectangle', false, currentStep);
    } else if (type === 'not') {
      newGate(gateX, gateY, 2, 2, layer, stage, 'img/not.png', 'notGate', 'user', 'rectangle', false, currentStep);
    } else if (type === 'ccswap') {
      newGate(gateX, gateY, 8, 2, layer, stage, 'img/ccswap.png', 'ccswapGate', 'user', 'rectangle', false, currentStep);
    } else if (type === 'cswap') {
      newGate(gateX, gateY, 6, 2, layer, stage, 'img/cswap.png', 'cswapGate', 'user', 'rectangle', false, currentStep);
    } else if (type === 'swap') {
      newGate(gateX, gateY, 4, 2, layer, stage, 'img/swap.png', 'swapGate', 'user', 'rectangle', false, currentStep);
    } else if (type === 'pete') {
      newGate(gateX, gateY, 2, 2, layer, stage, 'img/pete.png', 'peteGate', 'user', 'rectangle', false, currentStep);
    } else if (type === 'pipe') {
      newGate(gateX, gateY, 2, 2, layer, stage, 'img/pipe.png', 'pipeGate', 'user', 'rectangle', false, currentStep);
    } else if (type === 'white') {
      newGate(gateX, gateY, 2, 2, layer, stage, 'img/white.png', 'whiteBall', 'user', 'circle', false, currentStep);
    } else if (type === 'black') {
      newGate(gateX, gateY, 2, 2, layer, stage, 'img/black.png', 'blackBalls', 'user', 'circle', false, currentStep);
    }else if (type === 'wbmist') {
      // TODO changing size of mists
      newGate(gateX, gateY, 2, 2, layer, stage, 'img/wb.png', 'wbMist', 'user', 'rectangle', false, currentStep);
    } else if (type === 'wnegbmist') {
      // this one too
      newGate(gateX, gateY, 2, 2, layer, stage, 'img/wnegb.png', 'w-bMist', 'user', 'rectangle', false, currentStep);
    }

    stage.add(layer);
    type = '';
  }
});

function willOverlap(gateX, gateY) {
  let overlapping = false;
  let shapes = ["Image", "Rect", "Circle"];

  shapes.forEach((shape, i) => {
    let shapeInStage = stage.find(shape);
    shapeInStage.each(function (object) {
      if( !(object.attrs.shapeType.includes("shadow"))){
        let coordinates = [[parseInt(object.attrs.x), parseInt(object.attrs.y)]];
        let objectType = object.attrs.type;

        if(objectType.includes("ccswap")){
          coordinates.push([parseInt(object.attrs.x + 60), parseInt(object.attrs.y)]);
          coordinates.push([parseInt(object.attrs.x + 120), parseInt(object.attrs.y)]);
          coordinates.push([parseInt(object.attrs.x + 180), parseInt(object.attrs.y)]);
        } else if(objectType.includes("cswap")){
          coordinates.push([parseInt(object.attrs.x + 60), parseInt(object.attrs.y)]);
          coordinates.push([parseInt(object.attrs.x + 120), parseInt(object.attrs.y)]);
        } else if(objectType.includes("swap") || objectType.includes("cnot")){
          coordinates.push([parseInt(object.attrs.x + 60), parseInt(object.attrs.y)]);
        }

        for(var i = 0; i < coordinates.length; i++ && !overlapping) {
          let coordinate = coordinates[i];
          let tempBool = (((coordinate[0]|0) === (gateX|0)) && ((coordinate[1]|0) === (gateY|0)));

          if (tempBool){
            overlapping = true;
          }
        }
      }
    });
  });

  return overlapping;
}

/*############################################################################*/
/*####################### Colision Detection #################################*/
/*############################################################################*/

function haveIntersection(r1, r2) {

  if(r1.attrs.shapeType.includes('shadow') || r2.attrs.shapeType.includes('shadow') ){
    return false;
  }

  let y1 = r1.attrs.y;
  let h1 = r1.attrs.height;
  let x1 = r1.attrs.x;
  let w1 = r1.attrs.width

  let x2 = r2.attrs.x;
  let w2 = r2.attrs.width;
  let y2 = r2.attrs.y;
  let h2 = r2.attrs.height;


  let colision = !(
    x2 > (x1 + w1) * 0.95 ||
    (x2 + w2) * 0.95 < x1 ||
    y2 > y1 + h1/2 ||
    y2 + h2/2 < y1
  )

  return colision;
}

function hasLeftCanvas(r1) {

  if(r1.attrs.shapeType.includes('shadow') ){
    return false;
  }

  let y1 = r1.attrs.y;
  let h1 = r1.attrs.height;
  let x1 = r1.attrs.x;
  let w1 = r1.attrs.width;

  let left = 0;
  let right = width;
  let top = 0;
  let bottom = height;

  // console.log("y1 < top\n" + y1 + " < " + top +
  //             "\ny1 + h1 > bottom\n" + (y1 + h1) + " > " + bottom +
  //             "\nx1 < left\n" + x1 + " < " + left +
  //             "\ny1 < top\n" + (x1 + w1) + " > " + right);

  let colision = (
      y1 < top ||
      y1 + h1 > bottom ||
      x1 < left ||
      x1 + w1 > right
  )

  return colision;
}

function calcNewDepartureFromCanvasY(r1){
  y1 = r1.attrs.y
  h1 = r1.attrs.height;

  let top = 0;
  let bottom = height;

  console.log("y1 < top\n" + y1 + " < " + top +
              "\ny1 + h1 > bottom\n" + (y1 + h1) + " > " + bottom);

  if (y1 < top){
    return top;
  } else if((y1+h1) > bottom) {
    return (bottom - h1);
  } else {
    return y1;
  }
}

function calcNewDepartureFromCanvasX(r1){
  x1 = r1.attrs.x
  w1 = r1.attrs.width;

  let left = 0;
  let right = width;

  if (x1 < left){
    return left;
  } else if((x1+w1) > right) {
    return (right - w1);
  } else {
    return x1;
  }
}

function calcNewCollisionY(r1, r2){
  y1 = r1.attrs.y
  h1 = r1.attrs.height;

  y2 = r2.attrs.y
  h2 = r2.attrs.height;

  if ((y1 + h1/2) > (y2 + h2/2) > y1){
    return y1 - h2;
  } else {
    return (y1 + h1);
  }
}

function calcNewCollisionX(r1, r2){
  x1 = r1.attrs.x
  w1 = r1.attrs.width;

  x2 = r2.attrs.x
  w2 = r2.attrs.width;

  if ((x1 + w1/2) > (x2 + w2/2) > x1){
    return (x1 - w2);
  } else {
    return (x1 + w1);
  }
}

/*############################################################################*/
/*####################### Canvas Operations ##################################*/
/*############################################################################*/

layer.on('dragmove', function (e) {
  let target = e.target;

  layer.children.each(function (shape) {
    // do not check intersection with itself

    if (hasLeftCanvas(target)){
      newX = calcNewDepartureFromCanvasX(target)
      newY = calcNewDepartureFromCanvasY(target)
      target.position({
        x: newX,
        y: newY
      });
    } else if (shape === target) {
      return;
    } else if (haveIntersection(shape, target)) {
      newX = calcNewCollisionX(shape, target)
      newY = calcNewCollisionY(shape, target)
      target.position({
        x: newX,
        y: newY
      });
    }
  });
});

function clearBallsAndMists() {
  // select shapes by name
  let shapes = ["Image", "Circle", "Square", "Rect"];

  currentStep = 0;

  shapes.forEach((shape, i) => {
    let shapeInStage = stage.find(shape);
    console.log(shapeInStage.length);
    shapeInStage.each(function (object) {
      console.log(object);
      if(isNotObjectShadow(object.attrs.shapeType.toLowerCase()) &&
          isBallMistOrBoth(object.attrs.type.toLowerCase())){
        object.destroy();
        layer.draw();
      }
    });
  });
};

function clearSimulations() {
  // select shapes by name
  let objects = stage.find('#simulation');

  currentStep = 0;

  objects.each(function (object) {
    object.destroy();
    layer.draw();
  });
};

function clearAllObjects(){
  // select shapes by name

  let shapes = ["Image", "Rect", "Circle"];

  currentStep = 0;

  shapes.forEach((shape, i) => {
    let shapeInStage = stage.find(shape);
    shapeInStage.each(function (object) {
      console.log(shape);
      object.destroy();
    });
  });

  layer.draw();
};

function undoLastSimulation(){
  // select shapes by name
  let lastLevel = '' + currentStep;
  console.log("lastLevel: " + lastLevel);

  let objects = stage.find('#simulation');

  objects.each(function (object) {
    if(object.attrs.createdAtLevel === currentStep){
      object.destroy();
      layer.draw();
    }
  });

  currentStep = (currentStep > 0) ? currentStep - 1 : 1;
}

function getElementsFromCanvas(){
  let shapes = ["Image", "Circle"];
  let elements = [];

  shapes.forEach((shape, i) => {
    let shapeInStage = stage.find(shape);
    shapeInStage.each(function (object) {
      if(isNotObjectShadow(object.attrs.shapeType.toLowerCase())) {
        // retrieves all elements from canvas and pushes onto an array
        elements.push(createObject(object));
      }
    });
  });
  // returns the array
  return elements
}

// function drawObjects(objects, userGen=false){
//   let generationType = userGen ? "user" : "simulation";
//   objects.forEach((object, i) => {
//     if(object.constructor.name.toLowerCase() === 'ball'){
//       let imgFilePath = hideResults ? 'img/square.png' : ('img/' + ((object.color === 1) ? 'white' : 'black') + '.png');
//       let objectType = ((object.color === 1) ? 'white' : 'black') + 'Ball';

//       console.log("Current level in drawObjects: " + currentStep);
//       newGate(object.x - object.radius, object.y - object.radius, 2, 2, layer, stage, imgFilePath, objectType, generationType, 'circle', hideResults, currentStep);
//     } else if(object.constructor.name.toLowerCase() === 'mist'){
//       if(object.colorLeft === 1 && object.colorRight === 0 && object.signLeft === '+' && object.signRight === '+'){
//         newGate(object.x, object.y, 4, 2, layer, stage, 'img/wb.png', 'wbMist', generationType, 'rectangle', hideResults, currentStep);
//       } else {
//         newGate(object.x, object.y, 4, 2, layer, stage, 'img/wnegb.png', 'w-bMist', generationType, 'rectangle', hideResults, currentStep);
//       }
//     } else {
//       console.log("Something went wrong: " + object.toString());
//       return null;
//     }
//     stage.add(layer);
//   });


// }

function drawObjects(objects, userGen=false){

  let generationType = userGen ? "user" : "simulation";
  for(let i = 0; i < gridY; i++){
    for(let j = 0; j < gridX; j++){
      // if a cell is blank but has an input, display
      if(pseudoGrid[i][j].type = "blank"){
        if(object.constructor.name.toLowerCase() === 'ball'){
          let imgFilePath = hideResults ? 'img/square.png' : ('img/' + ((object.color === 1) ? 'white' : 'black') + '.png');
          let objectType = ((object.color === 1) ? 'white' : 'black') + 'Ball';
    
          console.log("Current level in drawObjects: " + currentStep);
          newGate(object.x - object.radius, object.y - object.radius, 2, 2, layer, stage, imgFilePath, objectType, generationType, 'circle', hideResults, currentStep);
        } else if(object.constructor.name.toLowerCase() === 'mist'){
          if(object.colorLeft === 1 && object.colorRight === 0 && object.signLeft === '+' && object.signRight === '+'){
            newGate(object.x, object.y, 4, 2, layer, stage, 'img/wb.png', 'wbMist', generationType, 'rectangle', hideResults, currentStep);
          } else {
            newGate(object.x, object.y, 4, 2, layer, stage, 'img/wnegb.png', 'w-bMist', generationType, 'rectangle', hideResults, currentStep);
          }
        } else {
          console.log("Something went wrong: " + object.toString());
          return null;
        }
        stage.add(layer);
      }
    }
  }
  
  // objects.forEach((object, i) => {
  //   if(object.constructor.name.toLowerCase() === 'ball'){
  //     let imgFilePath = hideResults ? 'img/square.png' : ('img/' + ((object.color === 1) ? 'white' : 'black') + '.png');
  //     let objectType = ((object.color === 1) ? 'white' : 'black') + 'Ball';

  //     console.log("Current level in drawObjects: " + currentStep);
  //     newGate(object.x - object.radius, object.y - object.radius, 2, 2, layer, stage, imgFilePath, objectType, generationType, 'circle', hideResults, currentStep);
  //   } else if(object.constructor.name.toLowerCase() === 'mist'){
  //     if(object.colorLeft === 1 && object.colorRight === 0 && object.signLeft === '+' && object.signRight === '+'){
  //       newGate(object.x, object.y, 4, 2, layer, stage, 'img/wb.png', 'wbMist', generationType, 'rectangle', hideResults, currentStep);
  //     } else {
  //       newGate(object.x, object.y, 4, 2, layer, stage, 'img/wnegb.png', 'w-bMist', generationType, 'rectangle', hideResults, currentStep);
  //     }
  //   } else {
  //     console.log("Something went wrong: " + object.toString());
  //     return null;
  //   }
  //   stage.add(layer);
  // });


}
// TODO split up from here

/*############################################################################*/
/*####################### Canvas Operations ##################################*/
/*############################################################################*/

function toggleHideOutput() {
  let checkBox = document.getElementById("checkIfHidden");
  hideResults = (checkBox.checked === true);
}

function run(allLevels = false) {

  let elements = getElementsFromCanvas();
  // elements is an array of all objects on canvas

  if(elements.length === 0){
    // if there are no things on canvas return false
    return false;
  }

  
  do {
      // level is row
    let levels = splitElementsIntoGroupsByElementLevel(elements);
    console.log("run 1 here", levels);
    let returnedVals = removeDisconectedLevels(levels);
    elements = returnedVals[1];
    console.log("run 2", returnedVals)

    let matchedObjects = matchLevels(returnedVals[0]);

    console.log("run3", matchedObjects);

    matchedObjects =  (matchedObjects);
     // TODO figure out what remove single objects even means and what we gave as an input to it

    if (matchedObjects.length === 0) {
      console.log("here is the problem")
      return false;
    }

    // instead of running the canvas whatever way it is right now, I want to be able to go from left to right and scan the grid for any ball, and allow it to fall through it next grate
    let simulationOutcome = simulate(matchedObjects);

    simulationOutcome = preventDuplicateElementsOnCanvas(simulationOutcome);

    if (simulationOutcome.length !== 0) {
      currentStep++;
    }
    // check to see if this is where the objects are actually represented on the gri
    drawObjects(simulationOutcome);

    elements.push(...simulationOutcome);

  }while(allLevels && (elements.length !== 0));

  return true;
}

function makeid(length) {
  let result           = '';
  let characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  let charactersLength = characters.length;
  for ( let i = 0; i < length; i++ ) {
    result += characters.charAt(Math.floor(Math.random() *
        charactersLength));
  }
  return result;
}

// function createObject(object) {
//   //TODO
//   let xcoord = (object.attrs.x - .5) / gridSnapSize;
//   let ycoord = object.attrs.y / gridSnapSize;

//   let num = -1;
  

//   console.log("in create object func", object.attrs.type.toLowerCase());
//   if(object.attrs.type.toLowerCase().includes("ccswap")){
//     num = 1;
//     return new CCSwap(object.attrs.x, object.attrs.y, object.attrs.width, object.attrs.height, makeid(10));
//   } else if(object.attrs.type.toLowerCase().includes("cswap")){
//     num = 2;
//     return new CSwap(object.attrs.x, object.attrs.y, object.attrs.width, object.attrs.height, makeid(10));
//   } else if(object.attrs.type.toLowerCase().includes("cnot")){
//     num = 3;
//     return new CNot(object.attrs.x, object.attrs.y, object.attrs.width, object.attrs.height, makeid(10));
//   } else if(object.attrs.type.toLowerCase().includes("swap")){
//     num = 4;
//     return new Swap(object.attrs.x, object.attrs.y, object.attrs.width, object.attrs.height, makeid(10));
//   } else if(object.attrs.type.toLowerCase().includes("not")){
//     num = 5;
//     console.log("not x: " + object.attrs.x + " not y: " + object.attrs.y);
//     return new Not(object.attrs.x, object.attrs.y, object.attrs.width, object.attrs.height, makeid(10));
//   } else if(object.attrs.type.toLowerCase().includes("pipe")){
//     num = 6;
//     return new Pipe(object.attrs.x, object.attrs.y, object.attrs.width, object.attrs.height, makeid(10));
//   } else if(object.attrs.type.toLowerCase().includes("pete")){
//     num = 7;
//     return new Pete(object.attrs.x, object.attrs.y, object.attrs.width, object.attrs.height, makeid(10));
//   } else if(object.attrs.type.toLowerCase().includes("black")){
//     num = 8;
//     return new Ball(0, '+', object.attrs.x + object.attrs.height/2, object.attrs.y + object.attrs.height/2, object.attrs.height/2, makeid(10));
//   } else if(object.attrs.type.toLowerCase().includes("white")){
//     num = 9;
//     return new Ball(1, '+', object.attrs.x + object.attrs.height/2, object.attrs.y + object.attrs.height/2, object.attrs.height/2, makeid(10));
//   } else if(object.attrs.type.toLowerCase().includes("wb")){
//     num = 10;
//     return new Mist(1, '+', 0, '+', object.attrs.x, object.attrs.y, object.attrs.width, object.attrs.height, makeid(10));
//   } else if(object.attrs.type.toLowerCase().includes("w-b")){
//     num = 11;
//     return new Mist(1, '+', 0, '-', object.attrs.x, object.attrs.y, object.attrs.width, object.attrs.height, makeid(10));
//   } else {
//     console.log("Something went wrong while creating the objects");
//     return null;
//   }
//   pseudoGrid[yCoord][xCoord] = num;
// }


function createObject(object) {
  //TODO
  let xCoord = (object.attrs.x - .5) / gridSnapSize;
  let yCoord = object.attrs.y / gridSnapSize;

  let code = -1;
  

  console.log("in create object func", object.attrs.type.toLowerCase());
  if(object.attrs.type.toLowerCase().includes("ccswap")){
    code = "";
    //return new CCSwap(object.attrs.x, object.attrs.y, object.attrs.width, object.attrs.height, makeid(10));
  } else if(object.attrs.type.toLowerCase().includes("cswap")){
    code = 2;
    //return new CSwap(object.attrs.x, object.attrs.y, object.attrs.width, object.attrs.height, makeid(10));
  } else if(object.attrs.type.toLowerCase().includes("cnot")){
    code = "3";
    //return new CNot(object.attrs.x, object.attrs.y, object.attrs.width, object.attrs.height, makeid(10));
  } else if(object.attrs.type.toLowerCase().includes("swap")){
    code = 4;
    //return new Swap(object.attrs.x, object.attrs.y, object.attrs.width, object.attrs.height, makeid(10));
  } else if(object.attrs.type.toLowerCase().includes("not")){
    code = "not";
    console.log("not x: " + object.attrs.x + " not y: " + object.attrs.y);
    return new Not(object.attrs.x, object.attrs.y, object.attrs.width, object.attrs.height, makeid(10));
  } else if(object.attrs.type.toLowerCase().includes("pipe")){
    code = 6;
    //return new Pipe(object.attrs.x, object.attrs.y, object.attrs.width, object.attrs.height, makeid(10));
  } else if(object.attrs.type.toLowerCase().includes("pete")){
    code = "pete";
    //return new Pete(object.attrs.x, object.attrs.y, object.attrs.width, object.attrs.height, makeid(10));
  } else if(object.attrs.type.toLowerCase().includes("black")){
    code = "black";
    //return new Ball(0, '+', object.attrs.x + object.attrs.height/2, object.attrs.y + object.attrs.height/2, object.attrs.height/2, makeid(10));
  } else if(object.attrs.type.toLowerCase().includes("white")){
    code = "white";
    //return new Ball(1, '+', object.attrs.x + object.attrs.height/2, object.attrs.y + object.attrs.height/2, object.attrs.height/2, makeid(10));
  } else if(object.attrs.type.toLowerCase().includes("wb")){
    code = 10;
    //return new Mist(1, '+', 0, '+', object.attrs.x, object.attrs.y, object.attrs.width, object.attrs.height, makeid(10));
  } else if(object.attrs.type.toLowerCase().includes("w-b")){
    code = 11;
    //return new Mist(1, '+', 0, '-', object.attrs.x, object.attrs.y, object.attrs.width, object.attrs.height, makeid(10));
  } else {
    console.log("Something went wrong while creating the objects");
    //return null;
  }
  //pseudoGrid[yCoord][xCoord] = new Cell(code, xCoord, yCoord, currGrid);
}
/**/
/*
  runs the pseudoGrid when the button is pressed
*/
function runGrid(){
  for(let i = 0; i < gridY; i++){
    for(let j = 0; j < gridX; j++){
      pseudoGrid[i + 1][j].output = pseudoGrid[i][j].input;
    }
  }
}

/**
 * Function returns boolean value depending on if the entered object type is a ball or mist
 * @param objectType A string containing the objectType
 * @param operationType 0 = check for ball, 1 = check for mist, 2 = check for both. 2 is default.
 */
function isBallMistOrBoth(objectType, operationType=2) {
  if (operationType === 0){
    return objectType.includes("ball");
  } else if(operationType === 1){
    return objectType.includes("mist");
  }else if(operationType === 2){
    return objectType.includes("ball") || objectType.includes("mist");
  }else{
    return false;
  }
}

function isNotObjectShadow(objectType){
  return !objectType.includes("shadow");
}

function isIn(checkIfIn, arrayToCheck){
  for (var i = 0; i < arrayToCheck.length; i++) {
    if( String(checkIfIn.id) === String(arrayToCheck[i]) ){
      return true;
    }
  }
  return false;
}

function preventDuplicateElementsOnCanvas(simulationOutcome){
  // select shapes by name

  let dictOfObjectsByCoordinates = {};

  simulationOutcome.forEach((element, i) => {
    if( !(element.getTopLeftCoordinates() in dictOfObjectsByCoordinates) ){
      dictOfObjectsByCoordinates[element.getTopLeftCoordinates()] = element.id;
    }
  });

  var objects = stage.find('Image');

  let idArray = [];
  objects.forEach((object, i) => {
    if(isNotObjectShadow(object.attrs.shapeType.toLowerCase()) &&
        isBallMistOrBoth(object.attrs.type.toLowerCase())){
      let x = parseInt(object.attrs.x);
      let y = parseInt(object.attrs.y);

      if([x, y] in dictOfObjectsByCoordinates){

        let idKey = String(dictOfObjectsByCoordinates[[x, y]]);
        idArray.push(idKey);
      }
    }
  });

  idArray = [...new Set(idArray)];

  let returnArr = [];

  simulationOutcome.forEach((outcome) => {
    if(!isIn(outcome, idArray)){
      returnArr.push(outcome);
    }
  });

  returnArr = [...new Set(returnArr)];

  return returnArr;
}

/**/

function splitElementsIntoGroupsByElementLevel(elements){
  let levels = {};

  elements.forEach((gate, i) => {
    if(gate.level in levels){
      levels[gate.level].push(gate);
    } else {
      levels[gate.level] = [gate];
    }
  });

  return levels;
}

function matchLevels(levels) {
  let keys = Object.keys(levels);
  let aboveRow = levels[keys[0]];
  // TODO
  for (let i = 1; i < keys.length; i++) {
    aboveRow = matchElements(aboveRow, levels[keys[i]]);
  }

  return aboveRow;
}

function matchElements(aboveRow, belowRow){
  let matchedObjects = [];
  let ids = [];
  let idDict = {};
  console.log("matchElements1");

  aboveRow.forEach((element, i) => {
    idDict[element.id] = element;
  });

  console.log("matchElements2");
  belowRow.forEach((element, i) => {
    let temp = matchElement(element, aboveRow);
    aboveRow = temp[1];
    matchedObjects.push(temp[0]);
    ids = Array.from(new Set(ids.concat(temp[0].getID())));
  });

  Object.keys(idDict).forEach((key, i) => {
    if( !(ids.includes(key)) ){
      matchedObjects.push(idDict[key]);
    }
  });


  matchedObjects = Array.from(new Set(matchedObjects));

  return matchedObjects;
}

function matchElement (element, aboveRow) {
  console.log("matchElement");
  aboveRow.forEach((elementAbove, i) => { //Loops through above elements
    elementAbove.getCenterCoordinates().forEach((centerCoordinates, j) => { //loops through all of the centers of the elements.

      if(element.isBelow(centerCoordinates[0], centerCoordinates[1])){
        element.addCenter(centerCoordinates[0], centerCoordinates[1], elementAbove,
            elementAbove.getCenterPosition(centerCoordinates[0], centerCoordinates[1]));
      }

    });
  });

  return [element, aboveRow];
}

function removeSingleObjects(objects) {
  let convertedObjects = [];

  for (let i = 0; i < objects.length; i++) {
    console.log("this happens");
    // if(objects[i].isComplete()){
    //   console.log("but this never does");
    //   convertedObjects.push(objects[i]);
    // }

    convertedObjects.push(objects[i]);
  }

  return convertedObjects;
}

function removeDisconectedLevels(levels){
  let convertedObjects = {};
  let keys = Object.keys(levels);
  console.log("keys and levs" , keys, levels);
  let prevKey = parseInt(keys[0]);
  convertedObjects[prevKey] = levels[prevKey];
  let unusedObjects = [];

  for (let i = 1; i < keys.length; i++) {
    console.log("keys", keys[i], prevKey, gridSnapSize);
    console.log((parseInt(keys[i]) === parseInt(parseInt(prevKey) + parseInt(gridSnapSize))));
    if((parseInt(keys[i]) === parseInt(parseInt(prevKey) + parseInt(gridSnapSize)))){
      convertedObjects[keys[i]] = levels[keys[i]];
    } else {
      unusedObjects.push(...levels[keys[i]]);
    }

    prevKey = keys[i];
  }

  return [convertedObjects, unusedObjects];
}

function simulate(matchedObjects){
  let newObjects = [];

  for (let i = 0; i < matchedObjects.length; i++) {

    try {
      console.log("inside run", matchedObjects[i]);
      let elementList = matchedObjects[i].run();

      elementList.forEach((item, i) => {
        newObjects.push(item);

      });
    }
    catch (e) {
      console.log("There was an error while trying to run a gate");
    }
  }

  return newObjects;
}





