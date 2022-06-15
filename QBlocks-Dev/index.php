<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="en-US" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en-US" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#">
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html lang="en-US" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#" xmlns="http://www.w3.org/1999/html">
<!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="https://quantumcurious.org/xmlrpc.php">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1'/>
    <!-- Optimized by SG Optimizer plugin version - 5.7.20 -->
    <!-- This site is optimized with the Yoast SEO plugin v16.0.2 - https://yoast.com/wordpress/plugins/seo/ -->
    <title>Learning Quantum Computing Using Misty States</title>
    <meta name="description" content="Learn quantum computing using balls, gates and misty clouds; based on book by Dr. Terry Rudolf. "/>
    <link rel="canonical" href="https://quantumcurious.org/misty-states/index.html"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="Learning Quantum Computing Using Misty States"/>
    <meta property="og:description" content="Learn quantum computing using balls, gates and misty clouds; based on book by Dr. Terry Rudolf. "/>
    <meta property="og:url" content="https://quantumcurious.org/misty-states/index.html"/>
    <meta property="og:site_name" content="Quantum Curious"/>
    <meta property="article:modified_time" content="2020-12-02T17:54:32+00:00"/>
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:label1" content="Est. reading time">
    <meta name="twitter:data1" content="1 minute">
    <script type="application/ld+json" class="yoast-schema-graph">{"@context":"https://schema.org","@graph":[{"@type":"Organization","@id":"https://quantumcurious.org/#organization","name":"Quantum Curious","url":"https://quantumcurious.org/","sameAs":[],"logo":{"@type":"ImageObject","@id":"https://quantumcurious.org/#logo","inLanguage":"en-US","url":"https://quantumcurious.org/wp-content/uploads/2020/07/lgo-r.png","width":900,"height":240,"caption":"Quantum Curious"},"image":{"@id":"https://quantumcurious.org/#logo"}},{"@type":"WebSite","@id":"https://quantumcurious.org/#website","url":"https://quantumcurious.org/","name":"Quantum Curious","description":"For Curious Minds","publisher":{"@id":"https://quantumcurious.org/#organization"},"potentialAction":[{"@type":"SearchAction","target":"https://quantumcurious.org/?s={search_term_string}","query-input":"required name=search_term_string"}],"inLanguage":"en-US"},{"@type":"WebPage","@id":"https://quantumcurious.org/why-this-site/#webpage","url":"https://quantumcurious.org/why-this-site/","name":"Why This Site? - Quantum Curious from Nathan Schor","isPartOf":{"@id":"https://quantumcurious.org/#website"},"datePublished":"2020-08-13T15:12:31+00:00","dateModified":"2020-12-02T17:54:32+00:00","description":"Quantum Curious is a collaboration site between Terrill Frantz and Nathan Schor, respectively a teacher and student of Quantum Computing.","breadcrumb":{"@id":"https://quantumcurious.org/why-this-site/#breadcrumb"},"inLanguage":"en-US","potentialAction":[{"@type":"ReadAction","target":["https://quantumcurious.org/why-this-site/"]}]},{"@type":"BreadcrumbList","@id":"https://quantumcurious.org/why-this-site/#breadcrumb","itemListElement":[{"@type":"ListItem","position":1,"item":{"@type":"WebPage","@id":"https://quantumcurious.org/","url":"https://quantumcurious.org/","name":"Home"}},{"@type":"ListItem","position":2,"item":{"@type":"WebPage","@id":"https://quantumcurious.org/why-this-site/","url":"https://quantumcurious.org/why-this-site/","name":"Why This Site?"}}]}]}</script>
    <!-- / Yoast SEO plugin. -->

    <link rel='dns-prefetch' href='//fonts.googleapis.com'/>
    <link rel='dns-prefetch' href='//s.w.org'/>
    <link rel="alternate" type="application/rss+xml" title="Quantum Curious &raquo; Feed" href="https://quantumcurious.org/feed/"/>
    <link rel="alternate" type="application/rss+xml" title="Quantum Curious &raquo; Comments Feed" href="https://quantumcurious.org/comments/feed/"/>
    <!-- This site uses the Google Analytics by MonsterInsights plugin v7.17.0 - Using Analytics tracking - https://www.monsterinsights.com/ -->
    <script src="//www.googletagmanager.com/gtag/js?id=UA-177271239-1" type="text/javascript" data-cfasync="false"></script>

    <script type="text/javascript" data-cfasync="false">
    var mi_version = '7.17.0';
    var mi_track_user = true;
    var mi_no_track_reason = '';

    var disableStr = 'ga-disable-UA-177271239-1';

    /* Function to detect opted out users */
    function __gtagTrackerIsOptedOut() {
        return document.cookie.indexOf(disableStr + '=true') > -1;
    }

    /* Disable tracking if the opt-out cookie exists. */
    if (__gtagTrackerIsOptedOut()) {
        window[disableStr] = true;
    }

    /* Opt-out function */
    function __gtagTrackerOptout() {
        document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
        window[disableStr] = true;
    }

    if ('undefined' === typeof gaOptout) {
        function gaOptout() {
            __gtagTrackerOptout();
        }
    }
    window.dataLayer = window.dataLayer || [];
    if (mi_track_user) {
        function __gtagTracker() {
            dataLayer.push(arguments);
        }
        __gtagTracker('js', new Date());
        __gtagTracker('set', {
            'developer_id.dZGIzZG': true,
        });
        __gtagTracker('config', 'UA-177271239-1', {
            forceSSL: true,
            link_attribution: true,
        });
        window.gtag = __gtagTracker;
        (
        function() {
            /* https://developers.google.com/analytics/devguides/collection/analyticsjs/ */
            /* ga and __gaTracker compatibility shim. */
            var noopfn = function() {
                return null;
            };
            var newtracker = function() {
                return new Tracker();
            };
            var Tracker = function() {
                return null;
            };
            var p = Tracker.prototype;
            p.get = noopfn;
            p.set = noopfn;
            p.send = function() {
                var args = Array.prototype.slice.call(arguments);
                args.unshift('send');
                __gaTracker.apply(null, args);
            };
            var __gaTracker = function() {
                var len = arguments.length;
                if (len === 0) {
                    return;
                }
                var f = arguments[len - 1];
                if (typeof f !== 'object' || f === null || typeof f.hitCallback !== 'function') {
                    if ('send' === arguments[0]) {
                        var hitConverted,
                            hitObject = false,
                            action;
                        if ('event' === arguments[1]) {
                            if ('undefined' !== typeof arguments[3]) {
                                hitObject = {
                                    'eventAction': arguments[3],
                                    'eventCategory': arguments[2],
                                    'eventLabel': arguments[4],
                                    'value': arguments[5] ? arguments[5] : 1,
                                }
                            }
                        }
                        if (typeof arguments[2] === 'object') {
                            hitObject = arguments[2];
                        }
                        if (typeof arguments[5] === 'object') {
                            Object.assign(hitObject, arguments[5]);
                        }
                        if ('undefined' !== typeof (
                        arguments[1].hitType
                        )) {
                            hitObject = arguments[1];
                        }
                        if (hitObject) {
                            action = 'timing' === arguments[1].hitType ? 'timing_complete' : hitObject.eventAction;
                            hitConverted = mapArgs(hitObject);
                            __gtagTracker('event', action, hitConverted);
                        }
                    }
                    return;
                }

                function mapArgs(args) {
                    var gaKey,
                        hit = {};
                    var gaMap = {
                        'eventCategory': 'event_category',
                        'eventAction': 'event_action',
                        'eventLabel': 'event_label',
                        'eventValue': 'event_value',
                        'nonInteraction': 'non_interaction',
                        'timingCategory': 'event_category',
                        'timingVar': 'name',
                        'timingValue': 'value',
                        'timingLabel': 'event_label',
                    };
                    for (gaKey in gaMap) {
                        if ('undefined' !== typeof args[gaKey]) {
                            hit[gaMap[gaKey]] = args[gaKey];
                        }
                    }
                    return hit;
                }

                try {
                    f.hitCallback();
                } catch (ex) {
                }
            };
            __gaTracker.create = newtracker;
            __gaTracker.getByName = newtracker;
            __gaTracker.getAll = function() {
                return [];
            };
            __gaTracker.remove = noopfn;
            __gaTracker.loaded = true;
            window['__gaTracker'] = __gaTracker;
        }
        )();
    } else {
        console.log("");
        (function() {
            function __gtagTracker() {
                return null;
            }
            window['__gtagTracker'] = __gtagTracker;
            window['gtag'] = __gtagTracker;
        })();
    }
    </script>
    <!-- / Google Analytics by MonsterInsights -->
    <script type="text/javascript">
    window._wpemojiSettings = {
        "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/13.0.1\/72x72\/",
        "ext": ".png",
        "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/13.0.1\/svg\/",
        "svgExt": ".svg",
        "source": {
            "concatemoji": "https:\/\/quantumcurious.org\/wp-includes\/js\/wp-emoji-release.min.js?ver=5.7"
        }
    };
    !function(e, a, t) {
        var n,
            r,
            o,
            i = a.createElement("canvas"),
            p = i.getContext && i.getContext("2d");
        function s(e, t) {
            var a = String.fromCharCode;
            p.clearRect(0, 0, i.width, i.height),
            p.fillText(a.apply(this, e), 0, 0);
            e = i.toDataURL();
            return p.clearRect(0, 0, i.width, i.height), p.fillText(a.apply(this, t), 0, 0), e === i.toDataURL()
        }
        function c(e) {
            var t = a.createElement("script");
            t.src = e,
            t.defer = t.type = "text/javascript",
            a.getElementsByTagName("head")[0].appendChild(t)
        }
        for (o = Array("flag", "emoji"), t.supports = {
            everything: !0,
            everythingExceptFlag: !0
        }, r = 0; r < o.length; r++)
            t.supports[o[r]] = function(e) {
                if (!p || !p.fillText)
                    return !1;
                switch (p.textBaseline = "top", p.font = "600 32px Arial", e) {
                case "flag":
                    return s([127987, 65039, 8205, 9895, 65039], [127987, 65039, 8203, 9895, 65039]) ? !1 : !s([55356, 56826, 55356, 56819], [55356, 56826, 8203, 55356, 56819]) && !s([55356, 57332, 56128, 56423, 56128, 56418, 56128, 56421, 56128, 56430, 56128, 56423, 56128, 56447], [55356, 57332, 8203, 56128, 56423, 8203, 56128, 56418, 8203, 56128, 56421, 8203, 56128, 56430, 8203, 56128, 56423, 8203, 56128, 56447]);
                case "emoji":
                    return !s([55357, 56424, 8205, 55356, 57212], [55357, 56424, 8203, 55356, 57212])
                }
                return !1
            }(o[r]),
            t.supports.everything = t.supports.everything && t.supports[o[r]],
            "flag" !== o[r] && (t.supports.everythingExceptFlag = t.supports.everythingExceptFlag && t.supports[o[r]]);
        t.supports.everythingExceptFlag = t.supports.everythingExceptFlag && !t.supports.flag,
        t.DOMReady = !1,
        t.readyCallback = function() {
            t.DOMReady = !0
        },
        t.supports.everything || (n = function() {
            t.readyCallback()
        }, a.addEventListener ? (a.addEventListener("DOMContentLoaded", n, !1), e.addEventListener("load", n, !1)) : (e.attachEvent("onload", n), a.attachEvent("onreadystatechange", function() {
            "complete" === a.readyState && t.readyCallback()
        })), (n = t.source || {}).concatemoji ? c(n.concatemoji) : n.wpemoji && n.twemoji && (c(n.twemoji), c(n.wpemoji)))
    }(window, document, window._wpemojiSettings);
    </script>
    <style type="text/css">
    img.wp-smiley, img.emoji {
        display: inline !important;
        border: none !important;
        box-shadow: none !important;
        height: 1em !important;
        width: 1em !important;
        margin: 0 .07em !important;
        vertical-align: -0.1em !important;
        background: none !important;
        padding: 0 !important;
    }
    </style>
    <link rel='stylesheet' id='layerslider-css' href='https://quantumcurious.org/wp-content/plugins/LayerSlider/assets/static/layerslider/css/layerslider.css?ver=6.11.6' type='text/css' media='all'/>
    <link rel='stylesheet' id='ls-google-fonts-css' href='https://fonts.googleapis.com/css?family=Muli:200,300,regular,600,700,800,900,500&#038;subset=latin%2Clatin-ext' type='text/css' media='all'/>
    <link rel='stylesheet' id='thegem-preloader-css' href='https://quantumcurious.org/wp-content/themes/thegem/css/thegem-preloader.css?ver=5.7' type='text/css' media='all'/>
    <style id='thegem-preloader-inline-css' type='text/css'>
    body:not(.compose-mode) .gem-icon-style-gradient span, body:not(.compose-mode) .gem-icon .gem-icon-half-1, body:not(.compose-mode) .gem-icon .gem-icon-half-2 {
        opacity: 0 !important;
    }
    </style>
    <link rel='stylesheet' id='thegem-reset-css' href='https://quantumcurious.org/wp-content/themes/thegem/css/thegem-reset.css?ver=5.7' type='text/css' media='all'/>
    <link rel='stylesheet' id='thegem-grid-css' href='https://quantumcurious.org/wp-content/themes/thegem/css/thegem-grid.css?ver=5.7' type='text/css' media='all'/>
    <link rel='stylesheet' id='thegem-style-css' href='https://quantumcurious.org/wp-content/themes/thegem/style.css?ver=5.7' type='text/css' media='all'/>
    <link rel='stylesheet' id='thegem-child-style-css' href='https://quantumcurious.org/wp-content/themes/thegem-child/style.css?ver=5.7' type='text/css' media='all'/>
    <link rel='stylesheet' id='thegem-header-css' href='https://quantumcurious.org/wp-content/themes/thegem/css/thegem-header.css?ver=5.7' type='text/css' media='all'/>
    <link rel='stylesheet' id='thegem-widgets-css' href='https://quantumcurious.org/wp-content/themes/thegem/css/thegem-widgets.css?ver=5.7' type='text/css' media='all'/>
    <link rel='stylesheet' id='thegem-new-css-css' href='https://quantumcurious.org/wp-content/themes/thegem/css/thegem-new-css.css?ver=5.7' type='text/css' media='all'/>
    <link rel='stylesheet' id='perevazka-css-css-css' href='https://quantumcurious.org/wp-content/themes/thegem/css/thegem-perevazka-css.css?ver=5.7' type='text/css' media='all'/>
    <link rel='stylesheet' id='thegem-google-fonts-css' href='//fonts.googleapis.com/css?family=Source+Sans+Pro%3A200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C600%2C600italic%2C700%2C700italic%2C900%2C900italic%7CMontserrat%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;subset=cyrillic%2Ccyrillic-ext%2Cgreek%2Cgreek-ext%2Clatin%2Clatin-ext%2Cvietnamese&#038;ver=5.7' type='text/css' media='all'/>
    <link rel='stylesheet' id='thegem-custom-css' href='https://quantumcurious.org/wp-content/themes/thegem-child/css/custom-IEZ2UXRU.css?ver=5.7' type='text/css' media='all'/>
    <style id='thegem-custom-inline-css' type='text/css'>
    #page-title {
        background-color: #6c7cd0;
        padding-top: 40px;
        padding-bottom: 40px;
    }

    #page-title h1, #page-title .title-rich-content {
        color: #ffffff;
    }

    .page-title-excerpt {
        color: #ffffff;
        margin-top: 18px;
    }

    #page-title .page-title-title {
    }

    .page-title-inner, body .breadcrumbs {
        padding-left: 0px;
        padding-right: 0px;
    }

    body .page-title-block .breadcrumbs-container {
        text-align: center;
    }

    .block-content {
        padding-top: 60px;
    }

    .block-content:last-of-type {
        padding-bottom: 110px;
    }

    #top-area {
        display: block;
    }

    @media (max-width: 991px) {
        #page-title {
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .page-title-inner, body .breadcrumbs {
            padding-left: 0px;
            padding-right: 0px;
        }

        .page-title-excerpt {
            margin-top: 18px;
        }

        #page-title .page-title-title {
            margin-top: 0px;
        }

        .block-content {
        }

        .block-content:last-of-type {
        }

        #top-area {
            display: block;
        }
    }

    @media (max-width: 767px) {
        #page-title {
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .page-title-inner, body .breadcrumbs {
            padding-left: 0px;
            padding-right: 0px;
        }

        .page-title-excerpt {
            margin-top: 18px;
        }

        #page-title .page-title-title {
            margin-top: 0px;
        }

        .block-content {
        }

        .block-content:last-of-type {
        }

        #top-area {
            display: block;
        }
    }
    </style>
    <link rel='stylesheet' id='js_composer_front-css' href='https://quantumcurious.org/wp-content/plugins/js_composer/assets/css/js_composer.min.css?ver=6.6.0' type='text/css' media='all'/>
    <link rel='stylesheet' id='thegem-additional-blog-1-css' href='https://quantumcurious.org/wp-content/themes/thegem/css/thegem-additional-blog-1.css?ver=5.7' type='text/css' media='all'/>
    <link rel='stylesheet' id='jquery-fancybox-css' href='https://quantumcurious.org/wp-content/themes/thegem/js/fancyBox/jquery.fancybox.min.css?ver=5.7' type='text/css' media='all'/>
    <link rel='stylesheet' id='thegem-vc_elements-css' href='https://quantumcurious.org/wp-content/themes/thegem/css/thegem-vc_elements.css?ver=5.7' type='text/css' media='all'/>
    <link rel='stylesheet' id='wp-block-library-css' href='https://quantumcurious.org/wp-includes/css/dist/block-library/style.min.css?ver=5.7' type='text/css' media='all'/>
    <link rel='stylesheet' id='contact-form-7-css' href='https://quantumcurious.org/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.4' type='text/css' media='all'/>
    <link rel='stylesheet' id='rs-plugin-settings-css' href='https://quantumcurious.org/wp-content/plugins/revslider/public/assets/css/rs6.css?ver=6.4.6' type='text/css' media='all'/>
    <style id='rs-plugin-settings-inline-css' type='text/css'>
    #rs-demo-id {
    }
    </style>
    <link rel='stylesheet' id='thegem_js_composer_front-css' href='https://quantumcurious.org/wp-content/themes/thegem/css/thegem-js_composer_columns.css?ver=5.7' type='text/css' media='all'/>
    <script type='text/javascript' id='thegem-settings-init-js-extra'>
    /* <![CDATA[ */
    var gemSettings = {
        "isTouch": "",
        "forcedLasyDisabled": "",
        "tabletPortrait": "",
        "tabletLandscape": "",
        "topAreaMobileDisable": "",
        "parallaxDisabled": "",
        "fillTopArea": "",
        "themePath": "https:\/\/quantumcurious.org\/wp-content\/themes\/thegem",
        "rootUrl": "https:\/\/quantumcurious.org",
        "mobileEffectsEnabled": "",
        "isRTL": ""
    };
    /* ]]> */
    </script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-content/themes/thegem/js/thegem-settings-init.js?ver=5.7' id='thegem-settings-init-js'></script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-includes/js/jquery/jquery.min.js?ver=3.5.1' id='jquery-core-js'></script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.3.2' id='jquery-migrate-js'></script>
    <script type='text/javascript' id='layerslider-utils-js-extra'>
    /* <![CDATA[ */
    var LS_Meta = {
        "v": "6.11.6",
        "fixGSAP": "1"
    };
    /* ]]> */
    </script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-content/plugins/LayerSlider/assets/static/layerslider/js/layerslider.utils.js?ver=6.11.6' id='layerslider-utils-js'></script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-content/plugins/LayerSlider/assets/static/layerslider/js/layerslider.kreaturamedia.jquery.js?ver=6.11.6' id='layerslider-js'></script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-content/plugins/LayerSlider/assets/static/layerslider/js/layerslider.transitions.js?ver=6.11.6' id='layerslider-transitions-js'></script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-content/themes/thegem/js/thegem-fullwidth-loader.js?ver=5.7' id='thegem-fullwidth-optimizer-js'></script>
    <!--[if lt IE 9]>
    <script type='text/javascript' src='https://quantumcurious.org/wp-content/themes/thegem/js/html5.js?ver=3.7.3' id='html5-js'></script>
    <![endif]-->
    <script type='text/javascript' id='monsterinsights-frontend-script-js-extra'>
    /* <![CDATA[ */
    var monsterinsights_frontend = {
        "js_events_tracking": "true",
        "download_extensions": "doc,pdf,ppt,zip,xls,docx,pptx,xlsx",
        "inbound_paths": "[{\"path\":\"\\\/go\\\/\",\"label\":\"affiliate\"},{\"path\":\"\\\/recommend\\\/\",\"label\":\"affiliate\"}]",
        "home_url": "https:\/\/quantumcurious.org",
        "hash_tracking": "false",
        "ua": "UA-177271239-1"
    };
    /* ]]> */
    </script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-content/plugins/google-analytics-for-wordpress/assets/js/frontend-gtag.min.js?ver=7.17.0' id='monsterinsights-frontend-script-js'></script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-content/plugins/revslider/public/assets/js/rbtools.min.js?ver=6.4.4' id='tp-tools-js'></script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-content/plugins/revslider/public/assets/js/rs6.min.js?ver=6.4.6' id='revmin-js'></script>
    <meta name="generator" content="Powered by LayerSlider 6.11.6 - Multi-Purpose, Responsive, Parallax, Mobile-Friendly Slider Plugin for WordPress."/>
    <!-- LayerSlider updates and docs at: https://layerslider.kreaturamedia.com -->
    <link rel="https://api.w.org/" href="https://quantumcurious.org/wp-json/"/>
    <link rel="alternate" type="application/json" href="https://quantumcurious.org/wp-json/wp/v2/pages/997"/>
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://quantumcurious.org/xmlrpc.php?rsd"/>
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://quantumcurious.org/wp-includes/wlwmanifest.xml"/>
    <meta name="generator" content="WordPress 5.7"/>
    <link rel='shortlink' href='https://quantumcurious.org/?p=997'/>
    <link rel="alternate" type="application/json+oembed" href="https://quantumcurious.org/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fquantumcurious.org%2Fwhy-this-site%2F"/>
    <link rel="alternate" type="text/xml+oembed" href="https://quantumcurious.org/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fquantumcurious.org%2Fwhy-this-site%2F&#038;format=xml"/>
    <meta name="generator" content="Powered by WPBakery Page Builder - drag and drop page builder for WordPress."/>
    <meta name="generator" content="Powered by Slider Revolution 6.4.6 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface."/>
    <link rel="icon" href="https://quantumcurious.org/wp-content/uploads/2020/10/Favicon.png" sizes="32x32"/>
    <link rel="icon" href="https://quantumcurious.org/wp-content/uploads/2020/10/Favicon.png" sizes="192x192"/>
    <link rel="apple-touch-icon" href="https://quantumcurious.org/wp-content/uploads/2020/10/Favicon.png"/>
    <meta name="msapplication-TileImage" content="https://quantumcurious.org/wp-content/uploads/2020/10/Favicon.png"/>
    <script>
    if (document.querySelector('[data-type="vc_custom-css"]')) {
        document.head.appendChild(document.querySelector('[data-type="vc_custom-css"]'));
    }
    </script>
    <script type="text/javascript">
    function setREVStartSize(e) {
        //window.requestAnimationFrame(function() {
        window.RSIW = window.RSIW === undefined ? window.innerWidth : window.RSIW;
        window.RSIH = window.RSIH === undefined ? window.innerHeight : window.RSIH;
        try {
            var pw = document.getElementById(e.c).parentNode.offsetWidth,
                newh;
            pw = pw === 0 || isNaN(pw) ? window.RSIW : pw;
            e.tabw = e.tabw === undefined ? 0 : parseInt(e.tabw);
            e.thumbw = e.thumbw === undefined ? 0 : parseInt(e.thumbw);
            e.tabh = e.tabh === undefined ? 0 : parseInt(e.tabh);
            e.thumbh = e.thumbh === undefined ? 0 : parseInt(e.thumbh);
            e.tabhide = e.tabhide === undefined ? 0 : parseInt(e.tabhide);
            e.thumbhide = e.thumbhide === undefined ? 0 : parseInt(e.thumbhide);
            e.mh = e.mh === undefined || e.mh == "" || e.mh === "auto" ? 0 : parseInt(e.mh, 0);
            if (e.layout === "fullscreen" || e.l === "fullscreen")
                newh = Math.max(e.mh, window.RSIH);
            else {
                e.gw = Array.isArray(e.gw) ? e.gw : [e.gw];
                for (var i in e.rl)
                    if (e.gw[i] === undefined || e.gw[i] === 0)
                        e.gw[i] = e.gw[i - 1];
                e.gh = e.el === undefined || e.el === "" || (Array.isArray(e.el) && e.el.length == 0) ? e.gh : e.el;
                e.gh = Array.isArray(e.gh) ? e.gh : [e.gh];
                for (var i in e.rl)
                    if (e.gh[i] === undefined || e.gh[i] === 0)
                        e.gh[i] = e.gh[i - 1];

                var nl = new Array(e.rl.length),
                    ix = 0,
                    sl;
                e.tabw = e.tabhide >= pw ? 0 : e.tabw;
                e.thumbw = e.thumbhide >= pw ? 0 : e.thumbw;
                e.tabh = e.tabhide >= pw ? 0 : e.tabh;
                e.thumbh = e.thumbhide >= pw ? 0 : e.thumbh;
                for (var i in e.rl)
                    nl[i] = e.rl[i] < window.RSIW ? 0 : e.rl[i];
                sl = nl[0];
                for (var i in nl)
                    if (sl > nl[i] && nl[i] > 0) {
                        sl = nl[i];
                        ix = i;
                    }
                var m = pw > (e.gw[ix] + e.tabw + e.thumbw) ? 1 : (pw - (e.tabw + e.thumbw)) / (e.gw[ix]);
                newh = (e.gh[ix] * m) + (e.tabh + e.thumbh);
            }
            if (window.rs_init_css === undefined)
                window.rs_init_css = document.head.appendChild(document.createElement("style"));
            document.getElementById(e.c).height = newh + "px";
            window.rs_init_css.innerHTML += "#" + e.c + "_wrapper { height: " + newh + "px }";
        } catch (e) {
            console.log("Failure at Presize of Slider:" + e)
        }

    }
    //});
    ;
    </script>
    <style type="text/css" data-type="vc_custom-css">
    .entry-content.post-content > .wpb_row:last-child, .gem-textbox-content > .wpb_row:last-child {
        margin-bottom: 0;
        font-size: 22px;
        line-height: 1.5;
        color: rgb(45, 41, 41);
    }
    </style>
    <style type="text/css" data-type="vc_shortcodes-custom-css">
    .vc_custom_1598445692319 {
        margin-top: -20px !important;
        padding-right: 6% !important;
        padding-left: 6% !important;
    }
    </style>
    <noscript>
        <style>
        .wpb_animate_when_almost_visible {
            opacity: 1;
        }
        </style>
    </noscript>
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->

    <!--    <link rel="stylesheet" href="css/custom.css?v=--><?//=filemtime("./css/custom.css")?><!--"/>-->
    <!--    <script src="js/custom.js?v=--><?//=filemtime("js/custom.js")?><!--"></script>-->

    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/button.css?v=<?=filemtime('css/button.css'); ?>" type="text/css" />
    <link rel="stylesheet" href="css/debug-lines.css?v=<?=filemtime('css/debug-lines.css'); ?>" type="text/css" />
    <link rel="stylesheet" href="css/fullwidth-div.css?v=<?=filemtime('css/fullwidth-div.css'); ?>" type="text/css" />
    <link rel="stylesheet" href="css/loading-indicator.css?v=<?=filemtime('css/loading-indicator.css'); ?>" type="text/css" />
    <link rel="stylesheet" href="css/main.css?v=<?=filemtime('css/main.css'); ?>" type="text/css" />
    <link rel="stylesheet" href="css/canvas.css?v=<?=filemtime('css/canvas.css'); ?>" type="text/css" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://unpkg.com/konva@7.2.5/konva.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
    <!-- ############################################################################################################ -->
</head>

<body class="page-template-default page page-id-997 wpb-js-composer js-comp-ver-6.6.0 vc_responsive">

    <div id="page" class="layout-fullwidth header-style-4">

        <a href="#page" class="scroll-top-button"></a>

        <div class="top-area-background top-area-scroll-hide">
            <div id="top-area" class="top-area top-area-style-default top-area-alignment-right">
                <div class="container">
                    <div class="top-area-items inline-inside"></div>
                </div>
            </div>
        </div>

        <div id="site-header-wrapper" class=" ">

            <header id="site-header" class="site-header mobile-menu-layout-slide-vertical" role="banner">

                <div class="header-background">
                    <div class="container container-fullwidth">
                        <div class="header-main logo-position-left header-layout-default header-layout-fullwidth header-style-4">
                            <div class="site-title">
                                <div class="site-logo" style="width:300px;">
                                    <a href="https://quantumcurious.org/" rel="home">
                                        <span class="logo">
                                            <img src="https://quantumcurious.org/wp-content/uploads/thegem-logos/logo_d945d790066a28d1bc6f54f03937d908_1x.png" srcset="https://quantumcurious.org/wp-content/uploads/thegem-logos/logo_d945d790066a28d1bc6f54f03937d908_1x.png 1x,https://quantumcurious.org/wp-content/uploads/thegem-logos/logo_d945d790066a28d1bc6f54f03937d908_2x.png 2x,https://quantumcurious.org/wp-content/uploads/thegem-logos/logo_d945d790066a28d1bc6f54f03937d908_3x.png 3x" alt="Quantum Curious" style="width:300px;" class="default"/>
                                            <img src="https://quantumcurious.org/wp-content/uploads/thegem-logos/logo_cb8f251991f3f8f35e338d7b63b4680c_1x.png" srcset="https://quantumcurious.org/wp-content/uploads/thegem-logos/logo_cb8f251991f3f8f35e338d7b63b4680c_1x.png 1x,https://quantumcurious.org/wp-content/uploads/thegem-logos/logo_cb8f251991f3f8f35e338d7b63b4680c_2x.png 2x,https://quantumcurious.org/wp-content/uploads/thegem-logos/logo_cb8f251991f3f8f35e338d7b63b4680c_3x.png 3x" alt="Quantum Curious" style="width:132px;" class="small"/>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
                                <button class="menu-toggle dl-trigger">
                                    Primary Menu
                                    <span class="menu-line-1"></span>
                                    <span class="menu-line-2"></span>
                                    <span class="menu-line-3"></span>
                                </button>
                                <div class="mobile-menu-slide-wrapper top">
                                    <button class="mobile-menu-slide-close"></button>
                                    <ul id="primary-menu" class="nav-menu styled no-responsive">
                                        <li id="menu-item-1108" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-1108 megamenu-first-element">
                                            <a href="https://quantumcurious.org/">Home</a>
                                        </li>
                                        <li id="menu-item-1107" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-1107 megamenu-first-element">
                                            <a href="https://quantumcurious.org/#start">Getting Started</a>
                                        </li>
                                        <li id="menu-item-1051" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-1051 megamenu-first-element">
                                            <a title="FOUR REASONS WHY QUANTUM CURIOSITY MAKES SENSE" href="https://quantumcurious.org/#four">Four Reasons</a>
                                        </li>
                                        <li id="menu-item-1053" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1053 megamenu-first-element">
                                            <a href="https://quantumcurious.org/why-this-site/">Why This Site?</a>
                                        </li>
                                        <li id="menu-item-1052" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-1052 megamenu-first-element">
                                            <a href="https://quantumcurious.org/#upcoming">Upcoming Events</a>
                                        </li>
                                        <li id="menu-item-1145" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-1145 megamenu-first-element">
                                            <a href="https://quantumcurious.org/#resources">Learning Resources</a>
                                        </li>
                                        <li class="menu-item menu-item-widgets mobile-only">
                                            <div class="menu-item-socials"></div>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
            <!-- #site-header -->
        </div>
        <!-- #site-header-wrapper -->

        <div id="main" class="site-main">

            <div id="main-content" class="main-content">

                <div id="page-title" class="page-title-block page-title-alignment-center page-title-style-1 ">

                    <div class="container">
                        <div class="page-title-inner">
                            <div class="page-title-title">
                                <h1>Learning Quantum Computing Using Misty States (beta)</h1>
                            </div>
                        </div>
                    </div>

                </div>


<!-- ############################################################################################################ -->
<!-- ############################################################################################################ -->
<!-- ############################################################################################################ -->
<!-- ############################################################################################################ -->
<!-- ############################################################################################################ -->
<!-- ############################################################################################################ -->
<!-- ############################################################################################################ -->
<!-- ############################################################################################################ -->
<!-- ############################################################################################################ -->
<!-- ############################################################################################################ -->
<!-- ############################################################################################################ -->
<!-- ############################################################################################################ -->
<!-- ############################################################################################################ -->
<!-- ############################################################################################################ -->
<!-- ############################################################################################################ -->
<!-- ############################################################################################################ -->


                <br style="clear: both" id="misty-states-canvas">

                <div class="total-canvas expand-div-across-full-width">
                  <!-- To make child exceed parent, add  'expand-child-past-parent' to class-->
                    <div id="container-flex">

                            <!---->
                            <main>
                                <aside class="left standardControlls">
                                        <!--  Gates Go Here-->
                                        <div class="row frame-around-balls space-bottom-2x">
                                            <div class="elements-box space-bottom">
                                                Balls
                                            </div>
                                            <div class="center-elements">
                                                <a id="drag-white" onmouseenter="over('White Ball')" onmouseleave="over('Tool-Tips')">
                                                    <img class="button-img" src="img/white.png" draggable="true">
                                                </a>
                                                <a id="drag-black" onmouseenter="over('Black Ball')" onmouseleave="over('Tool-Tips')">
                                                    <img class="button-img" src="img/black.png" draggable="true">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row frame-around-gates">
                                            <div class="elements-box space-bottom">
                                                Classical Gates
                                            </div>
                                            <div class="center-elements">
                                                <a id="drag-not" onmouseenter="over('Not Gate')" onmouseleave="over('Tool-Tips')">
                                                    <img class="button-img" src="img/not.png" draggable="true">
                                                </a>
                                                <a id="drag-swap" onmouseenter="over('Swap Gate')" onmouseleave="over('Tool-Tips')">
                                                    <img class="button-img" src="img/swap.png" draggable="true">
                                                </a>
                                                <a id="drag-cnot" onmouseenter="over('CNot Gate')" onmouseleave="over('Tool-Tips')">
                                                    <img class="button-img" src="img/cnot.png" draggable="true">
                                                </a>
                                                <a id="drag-cswap" onmouseenter="over('CSwap Gate')" onmouseleave="over('Tool-Tips')">
                                                    <img class="button-img" src="img/cswap.png" draggable="true">
                                                </a>

                                                <a id="drag-ccswap" onmouseenter="over('CCSwap Gate')" onmouseleave="over('Tool-Tips')">
                                                    <img class="button-img" src="img/ccswap.png" draggable="true">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="row frame-around-misty">
                                            <div class="elements-box space-bottom">
                                                Misty States
                                            </div>
                                            <div class="center-elements">
                                                <a id="drag-pete" onmouseenter="over('Pete Gate')" onmouseleave="over('Tool-Tips')">
                                                    <img class="button-img" src="img/pete.png" draggable="true">
                                                </a>
                                                <a id="drag-pipe" onmouseenter="over('Pipe Gate')" onmouseleave="over('Tool-Tips')">
                                                    <img class="button-img" src="img/pipe.png" draggable="true">
                                                </a>
                                                <a id="drag-wbmist" onmouseenter="over('WB Mist')" onmouseleave="over('Tool-Tips')">
                                                    <img class="button-img" src="img/wb.png" draggable="true">
                                                </a>
                                                <a id="drag-wnegbmist" onmouseenter="over('WNB Mist')" onmouseleave="over('Tool-Tips')">
                                                    <img class="button-img" src="img/wnegb.png" draggable="true">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="row tool-tips">
                                            <h2 class="heading">Hints</h2>
                                            <h3 id="title" class="title"></h3>
                                            <p id="description" class="description">Hover over a gate for more information.</p>
                                            <!----><!----><!---->
                                        </div>
                                </aside>
                                <section class="center">
                                    <!--  Focus of the webpage-->
                                    <div class="loader-wrapper hidden" id="loading-sign">
                                        <span class="loader"><span class="loader-inner"></span></span>
                                    </div>

                                    <!--  Mobile Elements Go Here-->
                                    <div class="row left-space scrollmenu mobileControlls">
                                        <div class="elements-box-mobile ">
                                            Balls
                                        </div>
                                        <a id="drag-white-mobile" onclick="createWHITE_BALL()">
                                            <img class="button-img-mobile" src="img/white.png" draggable="true">
                                        </a>
                                        <a id="drag-black-mobile" onclick="createBLACK_BALL()">
                                            <img class="button-img-mobile" src="img/black.png" draggable="true">
                                        </a>
                                        <div class="left-space elements-box-mobile border-left" style="padding-left: 20px; padding-right: 10px">
                                            Classical Gates
                                        </div>
                                        <a id="drag-not-mobile" onclick="createNOT_Gate()">
                                            <img class="button-img" src="img/not.png" draggable="true">
                                        </a>
                                        <a id="drag-swap-mobile" onclick="createSWAP_Gate()">
                                            <img class="button-img" src="img/swap.png" draggable="true">
                                        </a>
                                        <a id="drag-cnot-mobile" onclick="createCNOT_Gate()">
                                            <img class="button-img" src="img/cnot.png" draggable="true">
                                        </a>
                                        <a id="drag-cswap-mobile" onclick="createCSWAP_Gate()">
                                            <img class="button-img" src="img/cswap.png" draggable="true">
                                        </a>

                                        <a id="drag-ccswap-mobile" class="right-space" onclick="createCCSWAP_Gate()">
                                            <img class="button-img" src="img/ccswap.png" draggable="true">
                                        </a>
                                        <div class="elements-box-mobile border-left" style="padding-left: 20px; padding-right: 10px">
                                            Misty States
                                        </div>
                                        <a id="drag-pete-mobile" onclick="createPETE_Gate()">
                                            <img class="button-img" src="img/pete.png" draggable="true">
                                        </a>
                                        <a id="drag-pipe-mobile" onclick="createPIPE_Gate()">
                                            <img class="button-img" src="img/pipe.png" draggable="true">
                                        </a>
                                        <a id="drag-wbmist-mobile">
                                            <img class="button-img" src="img/wb.png" draggable="true">
                                        </a>
                                        <a id="drag-wnegbmist-mobile">
                                            <img class="button-img" src="img/wnegb.png" draggable="true">
                                        </a>
                                    </div>

                                    <!-- The Canvas-->
                                    <div class="canvas-inset">
                                        <div class="canvas-box" id="canvas-div" >
                                            <div class="canvas-box" id="canvas" ></div>
                                        </div>
                                    </div>

                                    <!-- Controls Go Here-->
                                    <div class="row left-space scrollmenu" id="controlStrip">

                                        <div class="vertical-spacer"></div>

                                        <a class="button-1x1 left-space green" onclick = "runNext()" onmouseenter="over('Run')" onmouseleave="over('Tool-Tips')" id="playButton">
                                            <p class="">Run</p>
                                        </a>

                                        <a class="button-2x1 left-space orange" onclick = "clearAllBallsAndMists()" onmouseenter="over('Remove All Balls')" onmouseleave="over('Tool-Tips')">
                                            <p class="">Clear Balls</p>
                                        </a>
                                        <a class="button-2x1 left-space orange right-space" onclick = "clearCanvas()" onmouseenter="over('Clear Canvas')" onmouseleave="over('Tool-Tips')">
                                            <p class="">Clear Canvas</p>
                                        </a>
                                        <div class="vertical-spacer"></div>
                                        <label class="checkbox_container left-space space-top right-space hand-mouse" onmouseenter="over('Hide output')" onmouseleave="over('Tool-Tips')">Hide output
                                            <input type="checkbox" class="red-line" id="checkIfHidden" onclick="toggleHideOutput();">
                                            <span class="checkmark"></span>
                                        </label>
                                        <div class="vertical-spacer"></div>
                                        <a href="https://www.youtube.com/channel/UCpB6QhTV4t1bVyiJ5niGvzQ" target="_blank" rel="noopener noreferrer" class="button-1-5x1 blue left-space right-space" id="tutorials-button" onmouseenter="over('Tutorials')" onmouseleave="over('Tool-Tips')">
                                            <p class="">Tutorials</p>
                                        </a>
                                        <div class="vertical-spacer"></div>
                                        <a class="button-2-5x1 left-space gray right-space" href="https://quantumcurious.org/feedback/" target="_blank" rel="noopener noreferrer">
                                            <p class="">Comments/Feedback</p>
                                        </a>
                                        <div class="vertical-spacer"></div>
                                    </div>
                                </section>
                            </main>

                    </div>
                    <br style="clear: both">
                    <p class="built-by-note">Created by <a href="https://www.linkedin.com/in/nathanschor" target="_blank">Nathan Schor</a> and <a href="https://www.linkedin.com/in/sarvesh-raghuraman-077045217/" target="_blank">Sarvesh Raghuraman</a>.</p>

                </div>


                <!-- Script Imports -->

                <script src="js/GatesAndParticles/Ball.js?v=<?=filemtime('js/GatesAndParticles/Ball.js'); ?>"></script>
                <script src="js/GatesAndParticles/Not.js?v=<?=filemtime('js/GatesAndParticles/Not.js'); ?>"></script>
                <script src="js/GatesAndParticles/CNot.js?v=<?=filemtime('js/GatesAndParticles/CNot.js'); ?>"></script>
                <script src="js/GatesAndParticles/CCSwap.js?v=<?=filemtime('js/GatesAndParticles/CCSwap.js'); ?>"></script>
                <script src="js/GatesAndParticles/Swap.js?v=<?=filemtime('js/GatesAndParticles/Swap.js'); ?>"></script>
                <script src="js/GatesAndParticles/CSwap.js?v=<?=filemtime('js/GatesAndParticles/CSwap.js'); ?>"></script>
                <script src="js/GatesAndParticles/Pete.js?v=<?=filemtime('js/GatesAndParticles/Pete.js'); ?>"></script>
                <script src="js/GatesAndParticles/Mist.js?v=<?=filemtime('js/GatesAndParticles/Mist.js'); ?>"></script>
                <script src="js/GatesAndParticles/Pipe.js?v=<?=filemtime('js/GatesAndParticles/Pipe.js'); ?>"></script>
                <script src="js/canvas.js?v=<?=filemtime('js/canvas.js'); ?>"></script>
                <script src="js/buttons.js?v=<?=filemtime('js/buttons.js'); ?>"></script>
                <script src="js/center-canvas.js?v=<?=filemtime('js/center-canvas.js'); ?>"></script>
                <script src="js/tooltips.js?v=<?=filemtime('js/tooltips.js'); ?>"></script>
                <script src="js/scroll-to-center.js?v=<?=filemtime('js/scroll-to-center.js'); ?>"></script>


  <!-- ############################################################################################################ -->
  <!-- ############################################################################################################ -->
  <!-- ############################################################################################################ -->
  <!-- ############################################################################################################ -->
  <!-- ############################################################################################################ -->
  <!-- ############################################################################################################ -->
  <!-- ############################################################################################################ -->
  <!-- ############################################################################################################ -->
  <!-- ############################################################################################################ -->
  <!-- ############################################################################################################ -->
  <!-- ############################################################################################################ -->
  <!-- ############################################################################################################ -->
  <!-- ############################################################################################################ -->
  <!-- ############################################################################################################ -->
  <!-- ############################################################################################################ -->
  <!-- ############################################################################################################ -->


            </div>
            <!-- #main-content -->

        </div>
        <!-- #main -->
        <div id="lazy-loading-point"></div>

        <footer id="footer-nav" class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-md-3 col-md-push-9"></div>

                    <div class="col-md-6"></div>

                    <div class="col-md-3 col-md-pull-9">
                        <div class="footer-site-info">© Copyright 2021 - Quantum Curious | All Rights Reserved</div>
                    </div>

                </div>
            </div>
        </footer>
        <!-- #footer-nav -->

    </div>
    <!-- #page -->

    <script type="text/html" id="wpb-modifications"></script>
    <script type='text/javascript' id='thegem-menu-init-script-js-extra'>
    /* <![CDATA[ */
    var thegem_dlmenu_settings = {
        "backLabel": "Back",
        "showCurrentLabel": "Show this page"
    };
    /* ]]> */
    </script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-content/themes/thegem/js/thegem-menu_init.js?ver=5.7' id='thegem-menu-init-script-js'></script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-content/themes/thegem/js/svg4everybody.js?ver=5.7' id='svg4everybody-js'></script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-content/themes/thegem/js/thegem-form-elements.js?ver=5.7' id='thegem-form-elements-js'></script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-content/themes/thegem/js/jquery.easing.js?ver=5.7' id='jquery-easing-js'></script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-content/themes/thegem/js/thegem-header.js?ver=5.7' id='thegem-header-js'></script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-content/themes/thegem/js/functions.js?ver=5.7' id='thegem-scripts-js'></script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-content/themes/thegem/js/fancyBox/jquery.mousewheel.pack.js?ver=5.7' id='jquery-mousewheel-js'></script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-content/themes/thegem/js/fancyBox/jquery.fancybox.min.js?ver=5.7' id='jquery-fancybox-js'></script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-content/themes/thegem/js/fancyBox/jquery.fancybox-init.js?ver=5.7' id='fancybox-init-script-js'></script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-includes/js/dist/vendor/wp-polyfill.min.js?ver=7.4.4' id='wp-polyfill-js'></script>
    <script type='text/javascript' id='wp-polyfill-js-after'>
    ('fetch' in window) || document.write('<script src="https://quantumcurious.org/wp-includes/js/dist/vendor/wp-polyfill-fetch.min.js?ver=3.0.0"></scr' + 'ipt>');
    (document.contains) || document.write('<script src="https://quantumcurious.org/wp-includes/js/dist/vendor/wp-polyfill-node-contains.min.js?ver=3.42.0"></scr' + 'ipt>');
    (window.DOMRect) || document.write('<script src="https://quantumcurious.org/wp-includes/js/dist/vendor/wp-polyfill-dom-rect.min.js?ver=3.42.0"></scr' + 'ipt>');
    (window.URL && window.URL.prototype && window.URLSearchParams) || document.write('<script src="https://quantumcurious.org/wp-includes/js/dist/vendor/wp-polyfill-url.min.js?ver=3.6.4"></scr' + 'ipt>');
    (window.FormData && window.FormData.prototype.keys) || document.write('<script src="https://quantumcurious.org/wp-includes/js/dist/vendor/wp-polyfill-formdata.min.js?ver=3.0.12"></scr' + 'ipt>');
    (Element.prototype.matches && Element.prototype.closest) || document.write('<script src="https://quantumcurious.org/wp-includes/js/dist/vendor/wp-polyfill-element-closest.min.js?ver=2.0.2"></scr' + 'ipt>');
    ('objectFit' in document.documentElement.style) || document.write('<script src="https://quantumcurious.org/wp-includes/js/dist/vendor/wp-polyfill-object-fit.min.js?ver=2.3.4"></scr' + 'ipt>');
    </script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-includes/js/dist/hooks.min.js?ver=50e23bed88bcb9e6e14023e9961698c1' id='wp-hooks-js'></script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-includes/js/dist/i18n.min.js?ver=db9a9a37da262883343e941c3731bc67' id='wp-i18n-js'></script>
    <script type='text/javascript' id='wp-i18n-js-after'>
    wp.i18n.setLocaleData({
        'text direction\u0004ltr': ['ltr']
    });
    </script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-includes/js/dist/vendor/lodash.min.js?ver=4.17.19' id='lodash-js'></script>
    <script type='text/javascript' id='lodash-js-after'>
    window.lodash = _.noConflict();
    </script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-includes/js/dist/url.min.js?ver=0ac7e0472c46121366e7ce07244be1ac' id='wp-url-js'></script>
    <script type='text/javascript' id='wp-api-fetch-js-translations'>
    (function(domain, translations) {
        var localeData = translations.locale_data[domain] || translations.locale_data.messages;
        localeData[""].domain = domain;
        wp.i18n.setLocaleData(localeData, domain);
    })("default", {
        "locale_data": {
            "messages": {
                "": {}
            }
        }
    });
    </script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-includes/js/dist/api-fetch.min.js?ver=a783d1f442d2abefc7d6dbd156a44561' id='wp-api-fetch-js'></script>
    <script type='text/javascript' id='wp-api-fetch-js-after'>
    wp.apiFetch.use(wp.apiFetch.createRootURLMiddleware("https://quantumcurious.org/wp-json/"));
    wp.apiFetch.nonceMiddleware = wp.apiFetch.createNonceMiddleware("dbc5709509");
    wp.apiFetch.use(wp.apiFetch.nonceMiddleware);
    wp.apiFetch.use(wp.apiFetch.mediaUploadMiddleware);
    wp.apiFetch.nonceEndpoint = "https://quantumcurious.org/wp-admin/admin-ajax.php?action=rest-nonce";
    </script>
    <script type='text/javascript' id='contact-form-7-js-extra'>
    /* <![CDATA[ */
    var wpcf7 = [];
    /* ]]> */
    </script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-content/plugins/contact-form-7/includes/js/index.js?ver=5.4' id='contact-form-7-js'></script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-includes/js/wp-embed.min.js?ver=5.7' id='wp-embed-js'></script>
    <script type='text/javascript' src='https://quantumcurious.org/wp-content/plugins/js_composer/assets/js/dist/js_composer_front.min.js?ver=6.6.0' id='wpb_composer_front_js-js'></script>
</body>
</html>
