
/*
 * Included on all .com webite pages to enhance basic page functionality.
 * @dependency - jquery
 * @dependency - jquery.sidr.min.js
 * @dependency - localstorage-util.js
 * @dependency - url-params.js
 * @dependency - olb-login.js
 * @author Andrew Arant
 * @author Katherine McGonigle
 */

var BasePage = {

    mobileNav : {
        init : function(){
            jQuery('#responsive-menu-button').sidr({ // initialize sidr (i.e. hamburger menu)
                name: 'sidr-main',
                source: '#navigation',
                side: 'right',
                onOpen: function() {
                    // On Open, Move Secondary Nav to be a child of the active <li>
                    jQuery('.sidr-class-primary-nav > .sidr-class-active').append(jQuery('.sidr-class-secondary-nav'));

                    // Search Form Also needs to be moved outside of Secondary Nav
                    jQuery('.sidr-class-main-nav').append(jQuery('.sidr-class-form-wrapper'));

                    // Change order of Search Input button, placing it before the text input field
                    jQuery('#sidr-id-searchform input[type=submit]').prependTo('#sidr-id-searchform');

                    if (jQuery('.sidr-hidden').children('li#register').length) {
                        jQuery('#sidr-id-main-menu-id').append(jQuery('.sidr-hidden').children('li#register'));
                    }
                },
                onCloseEnd: function() {
                    // On Close, Move Secondary Nav and Search Form back to original position
                    jQuery('.sidr-inner').append(jQuery('.sidr-class-secondary-nav'));
                    jQuery('.sidr-class-secondary-nav .sidr-class-container').append(jQuery('.sidr-class-form-wrapper'));
                    jQuery('.sidr-hidden').append(jQuery('#sidr-id-main-menu-id li#register'));
                }
            });

            // Add Placeholder text
            jQuery('#sidr-id-searchform #sidr-id-q').attr("placeholder","Search bbvacompass.com");

            // Aesthetic Only
            // When Sidr Mobile Menu is open, and user focuses on search input field, give the parent form a yellow bottom border
            jQuery('#sidr-id-search').bind('focus', function(){
                jQuery(this).parent().addClass('active');
            });
            jQuery('#sidr-id-search').bind('focusout', function(){
                jQuery(this).parent().removeClass('active');
            });
        }
    },

    searchBar : {
        containerWidth 	: jQuery('.container').outerWidth() - 30, // Subtracting total of Bootstrap margin, 15px on either side
        triggerElem 	: jQuery('.search-trigger'),
        parent 			: jQuery('.form-wrapper'),
        secondaryNav 	: jQuery('.secondary-nav ul'),
        inputField 		: jQuery('.form-wrapper input[type="text"]'),
        fadeSpeed 		: 150,
        searchHeight	: "71px",
        animationSpeed 	: 700,
        isOpen : false,
        show : function(){
            jQuery(BasePage.searchBar.secondaryNav).fadeOut(BasePage.searchBar.fadeSpeed);

            jQuery(BasePage.searchBar.parent).stop().delay(BasePage.searchBar.fadeSpeed).css({'display': 'block', 'height': BasePage.searchBar.searchHeight, 'overflow': 'hidden'}).animate({
                width: BasePage.searchBar.containerWidth
            }, BasePage.searchBar.animationSpeed, 'swing', function(){
                jQuery('.search-close-left').removeClass('search-close-left-outro').addClass('search-close-left-intro');
                jQuery('.search-close-right').removeClass('search-close-right-outro').addClass('search-close-right-intro');

                // Allowing for searchbar overflow (autocorrect dropdown)
                jQuery(BasePage.searchBar.parent).css({'height': 'auto', 'overflow': 'visible'});

                jQuery(BasePage.searchBar.inputField).focus();
                BasePage.searchBar.isOpen = true;
            });
        },
        hide : function(){
            jQuery('.search-close-left').removeClass('search-close-left-intro').addClass('search-close-left-outro');
            jQuery('.search-close-right').removeClass('search-close-right-intro').addClass('search-close-right-outro');

            if (BasePage.searchBar.isOpen) {
                jQuery(BasePage.searchBar.parent).stop().delay(BasePage.searchBar.fadeSpeed).css({'height': BasePage.searchBar.searchHeight, 'overflow': 'hidden'}).animate({
                    width: 0
                }, BasePage.searchBar.animationSpeed, 'swing', function(){
                    jQuery(BasePage.searchBar.secondaryNav).fadeIn(BasePage.searchBar.fadeSpeed);
                    BasePage.searchBar.isOpen = false;

                    jQuery(BasePage.searchBar.parent).css({'display': 'none'});
                });
            }
        },
        init : function(){
            // Hide close button initially
            jQuery('.search-close-left').addClass('search-close-left-outro');
            jQuery('.search-close-right').addClass('search-close-right-outro');

            // Setup to open search bar when search icon is clicked
            jQuery(BasePage.searchBar.triggerElem).on('click', BasePage.searchBar.show);

            // Close search bar if "X" button is clicked
            jQuery('.search-close').on('click', function () {
                BasePage.searchBar.hide();
            });

            // Change order of Search Input button, placing it before the text input field
            jQuery('#searchform input[type=submit]').prependTo('#searchform');

            // Add Placeholder text
            jQuery('#searchform #q').attr("placeholder","Search bbvacompass.com");

        }
    },

    selectField : {
        init : function () {

            // Aesthetic only
            // On pages with "select" dropdown form fields, init Select2
            var deviceAgent = navigator.userAgent.toLowerCase(),
                isTouchDevice = false;

            if (Modernizr.touch ||
                deviceAgent.match(/(iphone|ipod|ipad)/) ||
                deviceAgent.match(/(android)/)  ||
                deviceAgent.match(/(iemobile)/) ||
                deviceAgent.match(/iphone/i) ||
                deviceAgent.match(/ipad/i) ||
                deviceAgent.match(/ipod/i) ||
                deviceAgent.match(/blackberry/i) ||
                deviceAgent.match(/bada/i)) {
                isTouchDevice = true;
            }

            // City/State Selector inits Select2 at the appropriate place within its code; no need to init twice
            if (jQuery("select")[0] && !jQuery('#chooseRegionState')[0] && !isTouchDevice){
                // We only want the stylized select2 boxes on non-touch devices
                /*jQuery("select").select2({
                    // Hiding the search box within the select field
                    minimumResultsForSearch: Infinity,
                    // Allowing the select box to take on 100% width of its container
                    // Default width without this setting is 100px
                    width: '100%'
                });*/
            } else if (jQuery('.Modal')[0] && !jQuery('#chooseRegionState')[0] && !isTouchDevice) {
                // For select fields within modals, we also need to init
                var modalID = jQuery('.Modal > a').attr('data-target');

                jQuery(modalID).on('shown.bs.modal', function () {
                    if (jQuery(".modal select")[0]) {
                        jQuery(".modal select").select2({
                            // Hiding the search box within the select field
                            minimumResultsForSearch: Infinity,
                            // Allowing the select box to take on 100% width of its container
                            // Default width without this setting is 100px
                            width: '100%'
                        });
                    }
                })
            }
        }
    },

    responsiveTables : {
        init : function() {
            try{
                //responsive table
                var headertext = [];
                var headers = document.querySelectorAll("thead");
                var tablebody = document.querySelectorAll("tbody");

                for (var i = 0; i < headers.length; i++) {
                    headertext[i]=[];
                    for (var j = 0, headrow; headrow = headers[i].rows[0].cells[j]; j++) {
                        var current = headrow;
                        headertext[i].push(current.textContent);
                    }
                }

                for (var h = 0, tbody; tbody = tablebody[h]; h++) {
                    for (var i = 0, row; row = tbody.rows[i]; i++) {
                        for (var j = 0, col; col = row.cells[j]; j++) {
                            if (typeof headertext[h] != 'undefined'){
                                col.setAttribute("data-th", headertext[h][j]);
                            }
                        }
                    }
                }
            }
            catch(err){
                console.log('Error initializing responsive tables');
                console.log(err);
            }
        }
    },

    onWindowResize : function(){
        var containerW = jQuery('.container').outerWidth();
        if (BasePage.searchBar.isOpen) {
            // If the Search field is open, we'll need to reposition it
            jQuery(BasePage.searchBar.parent).css('width', containerW);
        }
        var windowWidth = jQuery(window).width();
        if (windowWidth < 1200 && !jQuery('#login-in-mobile .sign-in-wrapper')[0]) {
            // If resizing the window under 1200px AND header sign-in hasn't been moved to its mobile position,
            // Append it to the mobile container element
            jQuery('#login-in-mobile').append(jQuery('#header-sign-in .sign-in-wrapper'));
        } else if (windowWidth >= 1200 && !jQuery('#header-sign-in .sign-in-wrapper')[0]) {
            // If resizing the window over 1200px AND header sign-in hasn't been moved to its desktop position,
            // Append it to the desktop container element
            jQuery('#header-sign-in').append(jQuery('#login-in-mobile .sign-in-wrapper'));
        }

        // If we have a short page, the footer may not extend to the bottom of the page.
        // Check the page content height against the window height
        var windowHeight = jQuery(window).height();
        if (windowHeight > jQuery('body').height()){
            BasePage.footerSetHeight(windowHeight, jQuery('body').height());
        } else {
            // Footer height might need to be adjusted, so remove the explicit height style to get the true footer height
            jQuery('body > footer').css('height', 'auto');

            if (windowHeight > jQuery('body').height()){
                BasePage.footerSetHeight(windowHeight, jQuery('body').height());
            }
        }
    },

    footerSetHeight : function(windowHeight, bodyHeight) {
        // The window is taller than the page content, so extend the footer to touch the bottom of the window.
        // Otherwise, a strip of white space will appear underneath the footer.

        var heightDifference = windowHeight - bodyHeight,
            footerHeight = jQuery('body > footer').outerHeight();

        jQuery('body > footer').css('height', footerHeight+heightDifference);
    },

    init : function(){
        // Mobile menu toggle
        // Move Sign-in into main nav if browser is >= 1200 px wide
        if (jQuery(window).width() >= 1200){

            jQuery('#header-sign-in').append(jQuery('#login-in-mobile .sign-in-wrapper'));
        }
        // If there is a Maintenance Message, .sign-in-bg needs to be adjusted
        if (jQuery('.maintenance-notice-toggle')[0]){
            jQuery('.sign-in-bg').addClass('maintenance-notice-toggle-adjust');
        }
        // On Resize, get container size
        jQuery(window).on('resize', BasePage.onWindowResize);

        // If we have a short page, the footer may not extend to the bottom of the page.
        // Check the page content height against the window height
        if (jQuery(window).height() > jQuery('body').height()){
            BasePage.footerSetHeight(jQuery(window).height(), jQuery('body').height());
        }

        // Checking for touch device capability
        /*! modernizr 3.3.1 (Custom Build) | MIT *
         * https://modernizr.com/download/?-touchevents-setclasses !*/
        !function(e,n,t){function o(e,n){return typeof e===n}function s(){var e,n,t,s,a,i,r;for(var l in c)if(c.hasOwnProperty(l)){if(e=[],n=c[l],n.name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(t=0;t<n.options.aliases.length;t++)e.push(n.options.aliases[t].toLowerCase());for(s=o(n.fn,"function")?n.fn():n.fn,a=0;a<e.length;a++)i=e[a],r=i.split("."),1===r.length?Modernizr[r[0]]=s:(!Modernizr[r[0]]||Modernizr[r[0]]instanceof Boolean||(Modernizr[r[0]]=new Boolean(Modernizr[r[0]])),Modernizr[r[0]][r[1]]=s),f.push((s?"":"no-")+r.join("-"))}}function a(e){var n=u.className,t=Modernizr._config.classPrefix||"";if(p&&(n=n.baseVal),Modernizr._config.enableJSClass){var o=new RegExp("(^|\\s)"+t+"no-js(\\s|jQuery)");n=n.replace(o,"jQuery1"+t+"jsjQuery2")}Modernizr._config.enableClasses&&(n+=" "+t+e.join(" "+t),p?u.className.baseVal=n:u.className=n)}function i(){return"function"!=typeof n.createElement?n.createElement(arguments[0]):p?n.createElementNS.call(n,"http://www.w3.org/2000/svg",arguments[0]):n.createElement.apply(n,arguments)}function r(){var e=n.body;return e||(e=i(p?"svg":"body"),e.fake=!0),e}function l(e,t,o,s){var a,l,f,c,d="modernizr",p=i("div"),h=r();if(parseInt(o,10))for(;o--;)f=i("div"),f.id=s?s[o]:d+(o+1),p.appendChild(f);return a=i("style"),a.type="text/css",a.id="s"+d,(h.fake?h:p).appendChild(a),h.appendChild(p),a.styleSheet?a.styleSheet.cssText=e:a.appendChild(n.createTextNode(e)),p.id=d,h.fake&&(h.style.background="",h.style.overflow="hidden",c=u.style.overflow,u.style.overflow="hidden",u.appendChild(h)),l=t(p,e),h.fake?(h.parentNode.removeChild(h),u.style.overflow=c,u.offsetHeight):p.parentNode.removeChild(p),!!l}var f=[],c=[],d={_version:"3.3.1",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var t=this;setTimeout(function(){n(t[e])},0)},addTest:function(e,n,t){c.push({name:e,fn:n,options:t})},addAsyncTest:function(e){c.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=d,Modernizr=new Modernizr;var u=n.documentElement,p="svg"===u.nodeName.toLowerCase(),h=d._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):["",""];d._prefixes=h;var m=d.testStyles=l;Modernizr.addTest("touchevents",function(){var t;if("ontouchstart"in e||e.DocumentTouch&&n instanceof DocumentTouch)t=!0;else{var o=["@media (",h.join("touch-enabled),("),"heartz",")","{#modernizr{top:9px;position:absolute}}"].join("");m(o,function(e){t=9===e.offsetTop})}return t}),s(),a(f),delete d.addTest,delete d.addAsyncTest;for(var v=0;v<Modernizr._q.length;v++)Modernizr._q[v]();e.Modernizr=Modernizr}(window,document);

        // Aesthetic only
        // Select2 enables styling of <select> form fields
        BasePage.selectField.init();

        // Responsive tables
        // Table columns collapse into single cells on narrow resolutions
        BasePage.responsiveTables.init();

        // Circular images (profile images) on Officer Pages and Blog Pages (for Author image) use the object-fit property
        // This initializes a polyfill for browsers that do not natively support object-fit.
        if (jQuery('.profile-img')[0]){objectFitImages();}
    }
}


jQuery(document).ready( function(){
    BasePage.searchBar.init();
    BasePage.init();
});

BasePage.mobileNav.init(); // Initialize Mobile Navigation (i.e. hamburger menu)
