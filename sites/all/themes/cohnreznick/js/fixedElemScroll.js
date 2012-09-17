(function () {
    window.JSMODULES = (function (jQuery) {
        var $body, $content, $document, $footer, $window, homeScroll, inits, loaded, modules;
        loaded = {};
        $content = [];
        $body = [];
        $footer = [];
        $document = [];
        $window = [];
        inits = function () {
            $body = jQuery('body,html');
            $footer = jQuery("#footer");
            $document = jQuery(document);
            $window = jQuery(window);
            $content = jQuery(".div1");
        };
        homeScroll = function (pageHeight, foldCount, $illustrationsContainer, $lockedEls, $scrollEl, minHeight) {
            var $container, $illustrations, $illustrationsContainerBackup, $lockedElsBackup, $scroll, checkPageSize, lastFoldOffsetY, makeItStatic, newScrollPos, oldScrollPos, pageIsLocked, pageIsUnlockedByScroll, pageIsUnlockedBySize, pageLock, stickIt, timer;
            lastFoldOffsetY = pageHeight * (foldCount - 1);
            $illustrationsContainerBackup = $illustrationsContainer;
            $lockedElsBackup = $lockedEls;
            pageIsUnlockedByScroll = false;            
            $illustrations = $illustrationsContainer.find("img").first();
            oldScrollPos = 0;
            newScrollPos = 0;
            timer = 0;
            pageIsLocked = true;
            checkPageSize = function () {
                var footerHeight, missingHeight;
                footerHeight = $footer.height() + jQuery('#footer_bar').height() + jQuery("#country_slide_panel").height();
                missingHeight = $window.height() - (pageHeight + footerHeight);
                if (missingHeight > 0) $footer.css("height", footerHeight + missingHeight);
                return pageLock();
            };
            pageLock = function () {
                var hasSmallWindow, locked, marginLeft, scrollCondition, unlocked;
                hasSmallWindow = mobile || $window.height() < minHeight;
                scrollCondition = $document.scrollTop() > lastFoldOffsetY;
                if (scrollCondition && !pageIsUnlockedByScroll)  {
                    unlocked = {
                        position: "absolute",
                        top: lastFoldOffsetY
                    };
                    jQuery("body").css("background-attachment", "scroll");
                    
                    jQuery("body").css("background-position", jQuery(document).width() / 2 - 1115 + "px " + lastFoldOffsetY + "px");
                    $illustrationsContainer.css(unlocked);
                    $lockedEls.css(unlocked);                    
                    pageIsLocked = false;
                } else if (!scrollCondition && pageIsUnlockedByScroll ) {
                    $illustrationsContainer = $illustrationsContainerBackup;
                    $illustrationsContainer.removeClass("static");
                    $lockedEls = $lockedElsBackup;
                    jQuery("body").css("background-attachment", "fixed");
                    jQuery("body").css("background-position", jQuery(document).width() / 2 - 1115 + "px 0");
                    locked = {
                        position: "fixed",
                        top: 0
                    };
                    $illustrationsContainer.css(locked);
                    $lockedEls.css(locked);
                    pageIsLocked = true;
                }
                
                return pageIsUnlockedByScroll = scrollCondition;
            };
           /* stickIt = function () {
                var dir, pos, posPercent, scrollTo, scrollTop;
                if (pageIsLocked) {
                    scrollTop = $document.scrollTop();
                    pos = scrollTop % pageHeight;
                    scrollTo = scrollTop - pos;
                    posPercent = (pos * 100) / pageHeight;
                    dir = arguments[0] ? arguments[0] : null;
                    if (dir === "down" || (posPercent > 95 || (posPercent > 5 && newScrollPos > oldScrollPos)) && scrollTop < lastFoldOffsetY) {
                        scrollTo += pageHeight;
                        pos = pageHeight - pos;
                    } else if (dir === "up") {
                        scrollTo -= pageHeight;
                        pos = pageHeight;
                        if (scrollTop === lastFoldOffsetY) scrollTo = 0;
                    } else if (scrollTop > lastFoldOffsetY) {
                        scrollTo = lastFoldOffsetY;
                        pos = scrollTop - lastFoldOffsetY;
                    }
                    oldScrollPos = newScrollPos;
                    $body.stop(true, false).animate({
                        scrollTop: scrollTo
                    }, pos);
                    return $illustrations.stop(true, false).animate({
                        marginLeft: -((scrollTo * 380) / pageHeight)
                    }, pos);
                }
            };*/
            $lockedEls.css("position", mobile ? "absolute" : "fixed");
            $window.scroll(function () {
                var scrollTop;
                scrollTop = $document.scrollTop();
                if (scrollTop !== newScrollPos) {
                    oldScrollPos = newScrollPos;
                    newScrollPos = scrollTop;
                }
                if (timer) clearTimeout(timer);
                pageLock();
                /*if (!pageIsUnlockedByScroll && !pageIsUnlockedBySize) {
                        timer = setTimeout(function () {
                            return stickIt();
                        }, 300);
                        return $illustrations.stop(true, false).css("marginLeft", -((scrollTop * 380) / pageHeight));
                    }*/
            });
            $window.resize(function () {
                checkPageSize();
				pageLock();
                //return stickIt();
            });
        };
        modules = {
            homeInsReinsScroll: function () {
                var $switch, minHeight;
                    $switch = jQuery(".left_sidebar #nexia");
                    minHeight = $switch.offset().top + $switch.height() ;
                    return homeScroll(jQuery("#sideleft").height(), jQuery('#sideright').height() / jQuery("#sideleft").height(), $content.find("#center"), jQuery("#sideleft, .top, #working_slide_btn, #people_slide_btn"), $content, minHeight);
                
            }
        };
        return {
            add: function (newModules) {
                return jQuery.extend(modules, newModules);
            },
            load: function () {
                inits();
                return jQuery("[data-jsModules]").each(function () {
                    var $this, module, _i, _len, _ref, _results;
                    $this = $(this);
                    _ref = $this.attr("data-jsModules").split(",");
                    _results = [];
                    for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                        module = _ref[_i];
                        module = module.replace(/^\s+|\s+$/g, '');
                        if (typeof modules[module] === "function") {
                            if (typeof loaded[module] !== "object") {
                                loaded[module] = {
                                    options: modules[module]()
                                };
                            }
                            if (loaded[module].options && typeof loaded[module].options.executeAnyway === "function") {
                                _results.push(loaded[module].options.executeAnyway($this));
                            } else {
                                _results.push(void 0);
                            }
                        } else {
                            _results.push(void 0);
                        }
                    }
                    return _results;
                });
            }
        };
    })(jQuery);
    (function (jQuery) {
        return jQuery(function () {
            if (jQuery("html.ie6").length === 0) {
                return JSMODULES.load();
            } else {
                return jQuery("[disabled]").removeAttr("disabled");
            }
        });
    })(jQuery);
}).call(this);