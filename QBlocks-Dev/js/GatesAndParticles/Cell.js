function Cell(type, xCoord, yCoord, currGrid){
    this.xCoord = xCoord;
    this.yCoord = yCoord;
    this.type = type;
    this.input;
    // currGrid is the grid that we have currently
    // input is the input(s) to the gate
    this.output;
    this.output = function calculate(){
        switch(type){
            case "not":    
                this.input = currentGrid[yCoord - 1][xCoord];
                const notGate = math.matrix([[0, 1], [1, 0]])
                this.output = math.multiply(notGate, this.input);
                break;
            case "cnot-c":
                this.output = input;
                break;
            case "cnot-t":
                // first create a combined state using the kronecker product
                // then multiply against cnot matrix
                let tempState = math.kron(currGrid[yCoord][xCoord - 1].output, input);
                const cnotGate = math.matrix([[1, 0, 0, 0], [0, 1, 0, 0], [0, 0, 0, 1], [0, 0, 1, 0]]);
                this.output = math.multiply(cnotGate, tempState);
                break;
            case "pete":
                this.input = currentGrid[yCoord - 1][xCoord];
                const peteGate = math.matrix([[Math.SQRT1_2, Math.SQRT1_2], [Math.SQRT1_2, -1 * Math.SQRT1_2]]);
                this.output = math.multiply(peteGate, this.input);
                break;
            case "black":
                this.output = math.matrix([[0], [1]])
                break;
            case "white":
                this.output = math.matrix([[1], [0]])
                break;
            default:
                break;
        }
    }
    
}