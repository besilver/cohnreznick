jQuery(document).ready(function () {
    jQuery(window).scrollTop();
    setBackgroundPosition();
    setColumnMaxHeight();
    initSliders();
    initSlidePanels();
    setHeightDesignElements();
    mainNavigation();
    subNavigation();

    if (jQuery('.accordion_content').css('display') != 'block') {
        jQuery('.accordion_content').css('display', 'none');
    }

    if (!$.trim(jQuery("#center").html())) {
        var currImg = 1;
        var intID = setInterval(changeImg, 12000);
        /*  Change Background */
        var imgArr = new Array( // relative paths of images
        '/sites/all/themes/cohnreznick/images/vertical_photo_5.jpg', '/sites/all/themes/cohnreznick/images/vertical_photo_3.jpg', '/sites/all/themes/cohnreznick/images/vertical_photo_2.jpg', '/sites/all/themes/cohnreznick/images/vertical_photo_6.jpg', '/sites/all/themes/cohnreznick/images/vertical_photo_4.jpg', '/sites/all/themes/cohnreznick/images/vertical_photo_1.jpg', '/sites/all/themes/cohnreznick/images/vertical_photo_7.jpg', '/sites/all/themes/cohnreznick/images/vertical_photo_8.jpg', '/sites/all/themes/cohnreznick/images/vertical_photo_9.jpg');
        var preloadArr = new Array();
        var i;
        /* preload images */
        for (i = 0; i < imgArr.length; i++) {
            preloadArr[i] = new Image();
            preloadArr[i].src = imgArr[i];
        }


    } else {

        var imgr = document.getElementById("center").children[0];
        imgr.src = document.getElementById("center").children[0].src;

        var bgImgWidth = imgr.width;
        var bgImgHeight = imgr.height;
        myCanvas = document.createElement("canvas");
        myCanvasContext = myCanvas.getContext("2d");
        myCanvas.width = bgImgWidth;
        myCanvas.height = bgImgHeight;
        myCanvasContext.drawImage(imgr, 0, 0);
        var bgcolor = myCanvasContext.getImageData(bgImgWidth - 1, bgImgHeight - 1, 1, 1);
        jQuery("#center").css('background-color', 'rgb(' + bgcolor.data[0] + ', ' + bgcolor.data[1] + ', ' + bgcolor.data[2] + ')');
    }

    function changeImg() {
        jQuery('#center').fadeTo(1000, 0.3, function () {
            jQuery(this).css('background', 'url(' + preloadArr[i++ % preloadArr.length].src + ') no-repeat 0 0');
            var img = new Image;
            var pattern = /url\(|\)|"|'/g;
            img.src = jQuery('#center').css('background-image').replace(pattern, "");

            var bgImgWidth = img.width;
            var bgImgHeight = img.height;
            myCanvas = document.createElement("canvas");
            myCanvasContext = myCanvas.getContext("2d");
            myCanvas.width = img.width;
            myCanvas.height = img.height;
            myCanvasContext.drawImage(img, 0, 0);
            var bgcolor = myCanvasContext.getImageData(bgImgWidth - 1, bgImgHeight - 1, 1, 1);
            jQuery(this).css('background-color', 'rgb(' + bgcolor.data[0] + ', ' + bgcolor.data[1] + ', ' + bgcolor.data[2] + ')');
        }).fadeTo(1000, 1);
    }
});


jQuery(window).resize(function () {
    setBackgroundPosition();
    setColumnMaxHeight();
    setHeightDesignElements();
});

function setBackgroundPosition() {
    jQuery("body").css("background-position", jQuery(document).width() / 2 - 1115 + "px 0");
    jQuery('#sideleft .left_sidebar').removeClass("column");
}

function setColumnMaxHeight() {
    var currentTallest = 0,
        currentRowStart = 0,
        rowDivs = new Array(),
        $el,
        topPosition = 0;
    jQuery('.column, .col').each(function () {
        $el = jQuery(this);
        topPostion = $el.position().top;
        if (currentRowStart != topPostion) {
            for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
            rowDivs.length = 0;
            currentRowStart = topPostion;
            currentTallest = $el.height();
            rowDivs.push($el);
        } else {
            rowDivs.push($el);
            currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
        }
        for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });
    jQuery('.generic_column').each(function () {
        $el = jQuery(this);
        topPostion = $el.position().top;
        if (currentRowStart != topPostion) {
            for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
            rowDivs.length = 0;
            currentRowStart = topPostion;
            currentTallest = $el.height();
            rowDivs.push($el);
        } else {
            rowDivs.push($el);
            currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
        }
        for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });
}

function initSliders() {
    jQuery(function () {
        jQuery(".tabs").tabs();
    });
    if (jQuery("#panelSlider").children().length > 2) {
        jQuery('#panelSlider').bxSlider({
            displaySlideQty: 2,
            pager: true,
            wrapperClass: 'working-wrapper',
            moveSlideQty: 2
        });
    } else {
        jQuery('#panelSlider').bxSlider({
            displaySlideQty: 2,
            wrapperClass: 'working-wrapper',
            moveSlideQty: 2,
            pager: false,
            controls: false,
            auto: false,
            infiniteLoop: false
        });
    }
    if (jQuery("#slider").children().length > 2) {
        jQuery('#slider').bxSlider({
            displaySlideQty: 2,
            moveSlideQty: 2,
            pager: true
        });
    } else {
        jQuery('#slider').bxSlider({
            displaySlideQty: 2,
            moveSlideQty: 2,
            pager: false,
            controls: false,
            auto: false,
            infiniteLoop: false
        });
    }

    jQuery('#nivoSlider').nivoSlider({
        controlNav: false
    });
    jQuery('#quote_nivoSlider').nivoSlider({
        controlNav: false
    });
    jQuery('#widetopslider').nivoSlider({
        controlNav: false
    });

}

function initSlidePanels() {
    jQuery("#country").click(function () {
        jQuery("#country_slide_panel").slideToggle('slow');
        return false;
    });
    jQuery("#working_slide_btn").click(function () {
        jQuery("#right_slide_panel .slide_content").width(jQuery(document).width() / 2 + 240);
        jQuery("#right_slide_panel .slide_content").animate({
            width: 'toggle'
        });
        return false;
    });
    jQuery("#people_slide_btn").click(function () {
        jQuery("#right_slide_panel_people .slide_content").width(jQuery(document).width() / 2 + 240);
        jQuery("#right_slide_panel_people .slide_content").animate({
            width: 'toggle'
        });

    });
    jQuery(".accordion_slide_btn a").click(function () {
        jQuery(this).parent().next().slideToggle().parent().toggleClass('expanded');
        return false;
    });
}

function setHeightDesignElements() {
    /*  set position of center column */
    jQuery("#center").css('left', (jQuery(window).width() / 2) - 240);
    if (jQuery("#center:has(*)").length) {
        jQuery("#center").removeClass('column').height("auto");
        jQuery('#hover_img').css('display', 'none');
    } else {
        jQuery('#hover_img').css('display', 'block');
    }
    /*  set height of  orange mask and center column */
    jQuery("#center, #hover_img").height(jQuery("#sideright").height() - jQuery(window).scrollTop()).removeClass('column');
    if (jQuery("#center:has(*)").length && (jQuery("#center").height() > jQuery('#sideleft').height())) {} else {
        jQuery("#center, #hover_img").height(jQuery("#sideright").height() - jQuery(window).scrollTop());
        if (((jQuery("#center, #hover_img").height()) < jQuery("#sideleft").height()) || ((jQuery(document).height() - jQuery(window).height() - jQuery(window).scrollTop()) == 0)) {
            jQuery("#center, #hover_img").height(jQuery("#sideleft").height());
        }
    }
    jQuery(window).scroll(function () {

        jQuery("#center, #hover_img").height(jQuery("#sideright").height() - jQuery(window).scrollTop());
        if (((jQuery("#center, #hover_img").height()) < jQuery("#sideleft").height()) || ((jQuery(document).height() - jQuery(window).height() - jQuery(window).scrollTop()) == 0)) {
            jQuery("#center, #hover_img").height(jQuery("#sideleft").height());
        }


    });
    /*  set height of  main sub menu */
	
    jQuery("#main_nav li ul").height(jQuery("#sideright").height() - jQuery(window).scrollTop() - 230);
    jQuery(window).scroll(function () {
        jQuery("#main_nav li ul").height(jQuery("#sideright").height() - jQuery(window).scrollTop() - 230);
        if (jQuery("#center:has(*)").length && (jQuery("#center").height() > jQuery('#sideleft').height())) {
            if ((jQuery("#main_nav li ul").height() + 190) < jQuery("#center").height()) {
                jQuery("#main_nav li ul").height(jQuery("#center").height() - 198);
            }
        } else {
            if ((jQuery("#main_nav li ul").height() + 190) < jQuery("#sideleft").height()) {
                jQuery("#main_nav li ul").height(jQuery("#sideleft").height() - 198);
            }
        }
    });
	
}

jQuery.fn.extend({
    slideRightShow: function () {
        return this.each(function () {
            jQuery(this).show('slide', {
                direction: 'right'
            }, 1000);
        });
    },
    slideLeftHide: function () {
        return this.each(function () {
            jQuery(this).hide('slide', {
                direction: 'left'
            }, 1000);
        });
    },
    slideRightHide: function () {
        return this.each(function () {
            jQuery(this).hide('slide', {
                direction: 'right'
            }, 1000);
        });
    },
    slideLeftShow: function () {
        return this.each(function () {
            jQuery(this).show('slide', {
                direction: 'left'
            }, 1000);
        });
    }
});

function mainNavigation() {
  
jQuery('ul#main_nav div').append('<div class="close"></div>');
	jQuery('.close').click(function () {
            jQuery("ul#main_nav div").fadeOut('fast');	
            jQuery(this).parents('li').first().removeClass('expanded').addClass('collapsed');
    });	
	jQuery('ul#main_nav div li').each(function() {
		jQuery(this).children('div').css('width','270px').append('<div class="back">&larr; Back</div>');
		jQuery('.back').click(function () {
			 jQuery(this).parent('div:first').css('visibility', 'hidden').parent().parent().parent().css('visibility', 'visible');		 
		});
	});
	jQuery('ul#main_nav a').click(function () {
		if($(this).next().is('div')== true){
			if($(this).next().css('display') == 'none'){
				jQuery(this).parent('li').prevAll().removeClass('expanded').addClass('collapsed').children("div").fadeOut();
				jQuery(this).parent('li').nextAll().removeClass('expanded').addClass('collapsed').children("div").fadeOut();
				jQuery('ul#main_nav a').next().find('div').each(function() {					
					if(jQuery(this).hasClass('back') || jQuery(this).hasClass('close'))
					{}else jQuery(this).fadeOut().css('visibility', 'hidden').parent('li').removeClass('expanded').addClass('collapsed');
				});
					
				jQuery('#right_slide_panel .slide_content').hide('slow');
                jQuery('#right_slide_panel_people .slide_content').hide('slow');
				jQuery(this).parent('li').removeClass('expanded').addClass('collapsed');
                jQuery(this).next().fadeIn(); // Show submenu:
				jQuery(this).parent('li').removeClass('collapsed').addClass('expanded');
				jQuery(this).next().css('visibility', 'visible');
				if(jQuery(this).next().css('visibility', 'visible').parent().parent().parent().hasClass('left_sidebar')== true) 
					{						
						jQuery(this).parent().parent().parent().css('visibility','visible');		
					}
				else{
						jQuery(this).next().css('visibility', 'visible').parent().parent().parent().css('visibility','hidden');	
						if(jQuery(this).next().find('div.back').length == 1  && jQuery(this).parent('li').hasClass('expanded') ){
							jQuery(this).parent().parent().parent().css('visibility','hidden');
							jQuery(this).next().children('div.close').css('left','237px');
						}	
					}
			}
			else{
				jQuery(this).next().fadeOut();
				jQuery('ul#main_nav a').next().find('div').each(function() {					
					if(jQuery(this).hasClass('back') || jQuery(this).hasClass('close'))
					{}else jQuery(this).fadeOut().css('visibility', 'hidden').parent('li').removeClass('expanded').addClass('collapsed');
				});
			}
			
			return false;
		}
		else{
			
		}
		
	});
}

function subNavigation() {
    jQuery('ul#sub_nav ul').each(function (i) {


        if ($.cookie('submenuMark-' + i)) { // If index of submenu is marked in cookies:
            $(this).show().prev().removeClass('collapsed').addClass('expanded'); // Show it (add apropriate classes)
        } else {
            $(this).hide().prev().removeClass('expanded').addClass('collapsed'); // Hide it
        }
        $(this).prev().addClass('collapsible').click(function () { // Attach an event listener
            var this_i = $('ul#sub_nav ul').index($(this).next()); // The index of the submenu of the clicked link
            if ($(this).next().css('display') == 'none') {
                $(this).next().slideDown(200, function () { // Show submenu:
                    $(this).prev().removeClass('collapsed').addClass('expanded');
                    cookieSet(this_i);
                });
            } else {
                cookieDel(this_i);
                $(this).next().slideUp(200, function () { // Hide submenu:
                    $(this).prev().removeClass('expanded').addClass('collapsed');
                    cookieDel(this_i);
                    $(this).find('ul').each(function () {
                        $(this).hide(0, cookieDel($('ul#sub_nav ul').index($(this)))).prev().removeClass('expanded').addClass('collapsed');
                    });
                });
            }
            return false; // Prohibit the browser to follow the link address

        });
    });

    

}
function cookieSet(index) {
        $.cookie('submenuMark-' + index, 'opened', {
            expires: null,
            path: '/'
        }); // Set mark to cookie (submenu is shown):
		
    }

    function cookieDel(index) {
        $.cookie('submenuMark-' + index, null, {
            expires: null,
            path: '/'
        }); // Delete mark from cookie (submenu is hidden):
    }
var iPad = false;
var mobile = false;
if (typeof navigator != "undefined") {
    if (/iphone|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent.toLowerCase())) {
        mobile = true;
        document.getElementsByTagName('html')[0].className += ' mobile';
    }
    if (navigator.platform === 'iPad') {
        iPad = true;
        document.getElementsByTagName('html')[0].className += ' ipad';
    } else {
        document.getElementsByTagName('html')[0].className += ' no-ipad';
    }
    if (navigator.appVersion.indexOf("MSIE") != -1) {
        document.getElementsByTagName('html')[0].className += ' ie';
        version = parseFloat(navigator.appVersion.split("MSIE")[1]);
        document.getElementsByTagName('html')[0].className += ' ie' + version;
    }
}
// don't break if you don't support console log
if (typeof window.console == "undefined") window.console = {
    log: function () {}
}