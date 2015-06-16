﻿/*
* Hot Joomla Templates - jQuery Mega menu 1.0.0
*
* Copyright 2010,(http://www.hotjoomlatemplates.com)
*
*
* Depends:
*   jquery.ui.core.js
*   jquery.ui.widget.js
*/


(function(jQuery, undefined) {
    jQuery.widget("hjt.megamenu", {
        options: {
            fade: true,
            slide: true,
            animation_speed: 'slow',
            down_arrows: true,
            separators: null,
            max_columns: 4
        },

        _BaseHTML: "",
        _Container: null,
        _InnerElements: null,
        _AnimatedItem: null,
        MarginFixHorisontal :null,

        _create: function() {
            var self = this,
                options = self.options;
            var $el = jQuery(this.element);

            $el.hide();



            if (options.separators != null && options.separators != '') {

                var n = 0;

                $el.find('.separator, a:contains("#LOAD#"), a:contains("#load#"), a:contains("#Load#")').each(function(index) {

                    if (options.separators.length > n) {

                        var sHtml = jQuery(jQuery(document).find(options.separators[n])[0]);

                        if (sHtml[0]) {

                            sHtml.remove();

                            jQuery(jQuery(this)[0].parentNode).replaceWith(sHtml);

                        }

                    } else {

                            var sHtml = jQuery(jQuery(document).find('.megamenu_separator' + String(n + 1))[0]);

                            if (sHtml[0]) {

                                sHtml.remove();

                                jQuery(jQuery(this)[0].parentNode).replaceWith(sHtml);

                            }

                     }

                    n++;

                });

            }

            else {

                var n = 0;

                $el.find('.separator, a:contains("#LOAD#"), a:contains("#load#"), a:contains("#Load#")').each(function(index) {
                        var sHtml = jQuery(jQuery(document).find('.megamenu_separator' + String(n + 1))[0]);
                        if (sHtml[0]) {
                            sHtml.remove();
                            jQuery(jQuery(this)[0].parentNode).replaceWith(sHtml);
                        }
                    n++;
                });
            }
            
            $el.addClass("hjt-megamenu-menubar");
            $el.children().addClass("hjt-megamenu-menubar-item");

            $el.show();
            $el.children().each(function(index) {
                if (this.nodeName.toUpperCase() == "LI") {
                    var ULs = jQuery(this).find('UL').length - jQuery(this).find('*[class*="megamenu_separator"] UL').length;
                    if (ULs > 0) {
                        if (ULs > 1) ULs = ULs - 1;

                        try {
                            if (options.down_arrows) {
                                jQuery(jQuery(this).find('A')[0]).append(jQuery("<span class='hjt-megamenu-manubar-droparrow' >&nbsp;&nbsp;</span>"));
                            }
                        } catch (ecx) {
                        }

                        var Cols = options.max_columns;
                        var Rows = Math.ceil(ULs / Cols);

                        if (ULs < Cols) {
                            Cols = ULs;
                        }
                        else {
                            Rows = Math.ceil(ULs / Cols);
                        }

                        var i = 0;
                        var sTDs = "";
                        var sTDsB = "";
                        var sCOLS = "";
                        for (i = 0; i < Cols; i++) {
                            sCOLS = sCOLS + "<col class='hjt-megamenu-contextcolumn'>";
                            sTDs = sTDs + "<td class='hjt-megamenu-dropdown-panel-content' ></td>";
                            sTDsB = sTDsB + "<td class='hjt-megamenu-dropdown-panel-bottom' ></td>";
                        }
                        var sCOLS = "<colgroup><col class='hjt-megamenu-sidecolumn' >" + sCOLS + "<col class='hjt-megamenu-sidecolumn' ></colgroup>";

                        var sRows = "";
                        var sRow = "<tr><td class='hjt-megamenu-dropdown-panel-left' ><div class='hjt-megamenu-sidecolumn' ></div></td>" + sTDs + "<td class='hjt-megamenu-dropdown-panel-right' ><div class='hjt-megamenu-sidecolumn' ></div></td></tr>";
                        for (i = 0; i < Rows; i++) {
                            sRows = sRows + sRow;
                        }
                        var sRowBottom = "<tr><td class='hjt-megamenu-dropdown-panel-bottomleft' ></td>" + sTDsB + "<td class='hjt-megamenu-dropdown-panel-bottomright' ></td></tr>";

                        var DropDownDiv = jQuery("<div class='hjt-megamenu-dropdown-panel'><table cellpadding='0' cellspacing='0' >" + sCOLS + sRows + sRowBottom + "</table></div>");

                        var Cells = DropDownDiv.find('.hjt-megamenu-dropdown-panel-content');
                        var c = 0;
                        var r = 0;


                        jQuery(this).children('UL').each(function(index) {//uvek1
                            jQuery(this).remove();
                            var Multiple = false;
                            var Title = null;

                            jQuery(this).children('LI').each(function(index) {
                                jQuery(this).children('UL').each(function(index) {
                                    Multiple = true;
                                    try {
                                        if (this.parentNode.children[0].nodeName != "UL") {
                                            Title = jQuery(this.parentNode.children[0]);
                                            Title.addClass('hjt-megamenu-dropdown-panel-list-title');
                                        }
                                    } catch (exp) { }
                                    if (Title != null) jQuery(Cells[r * Cols + c]).append(Title);
                                    jQuery(Cells[r * Cols + c]).append(jQuery(this));
                                    jQuery(this).addClass("hjt-megamenu-dropdown-panel-list");
                                    c++;
                                    if (c == Cols) {
                                        c = 0;
                                        r++;
                                    }


                                });
                            });

                            if (Multiple == false) {
                                jQuery(Cells[r * Cols + c]).append(jQuery(this));
                                jQuery(this).addClass("hjt-megamenu-dropdown-panel-list");
                                c++;
                                if (c == Cols) {
                                    c = 0;
                                    r++;
                                }
                            }
                        });

                        jQuery(this).append(DropDownDiv);

                        if (DropDownDiv.innerWidth() < jQuery(this).innerWidth()) {
                            DropDownDiv.find('table').css({ minWidth: jQuery(this).innerWidth() + 'px' });
                            DropDownDiv.find('table').css({ width: jQuery(this).innerWidth() + 'px' });
                        }

                        if (options.slide) {
                            DropDownDiv.animate({ height: 'toggle' }, 0);
                            DropDownDiv.animate({ height: 'toggle' }, 0);
                        }
                    }
                }
                jQuery(this).addClass("hjt-megamenu-menubar-item-normal");
                jQuery(this).bind('mouseenter', { Sender: jQuery(this), Self: self }, self.onBarItem_Enter);
                jQuery(this).bind('mouseleave', { Sender: jQuery(this), Self: self }, self.onBarItem_Leave);
            });
			
			jQuery(window).resize(function(){
			   if(self._AnimatedItem){
			     if(self._AnimatedItem.is(":visible")){
			         self.positionDropDown(self._AnimatedItem);
			     }
			   }
			});
			
        },

        _setOption: function(key, value) {
            this.options[key] = value;
        },

        positionDropDown:function(Panel){
		
			var offView = (jQuery(window).width() - Panel.parent().offset().left) - Panel.innerWidth();
			if(offView > 0){
			  offView = 0;
			};
			Panel.css('left',(Panel.parent().position().left + offView) + 'px');
		},
        onBarItem_Enter: function(eArgs) {
            var Sender = eArgs.data.Sender;
            var options = eArgs.data.Self.options; 
			if(Sender.hasClass("hjt-megamenu-menubar-item-hover")) return;
            Sender.addClass("hjt-megamenu-menubar-item-hover").removeClass("hjt-megamenu-menubar-item-normal");
            var Panels = Sender.find('.hjt-megamenu-dropdown-panel');
            if (Panels.length > 0) {
                if (eArgs.data.Self._AnimatedItem != null) {
                    eArgs.data.Self._AnimatedItem.stop(true, true);
                }
                eArgs.data.Self._AnimatedItem = jQuery(Panels[0]);
                eArgs.data.Self.positionDropDown(eArgs.data.Self._AnimatedItem);
				
                
                if (options.fade && options.slide) {
                    jQuery(Panels[0]).animate({ opacity: 'toggle', height: 'toggle' }, options.animation_speed);
                }
                else if (options.fade) {
                    jQuery(Panels[0]).animate({ opacity: 'toggle' }, options.animation_speed);
                }
                else if (options.slide) {
                    jQuery(Panels[0]).animate({ height: 'toggle' }, options.animation_speed);
                }
                else {
                    jQuery(Panels[0]).show();
                }

                var MaxWidth = 0;
                jQuery(Panels[0]).find('.hjt-megamenu-dropdown-panel-content').each(function(index) {
                    if (jQuery(this).innerWidth() > MaxWidth) {
                        MaxWidth = jQuery(this).innerWidth();
                    }
                });

                if (jQuery.browser.msie && jQuery.browser.version < 8) {
                    //
                }
                else {
                    jQuery(Panels[0]).find('.hjt-megamenu-contextcolumn').css({ width: String(MaxWidth) + 'px' });
                }
            }
        },

        onBarItem_Leave: function(eArgs) {
            var Sender = eArgs.data.Sender;
            var options = eArgs.data.Self.options;
            Sender.addClass("hjt-megamenu-menubar-item-normal").removeClass("hjt-megamenu-menubar-item-hover");
            var Panels = Sender.find('.hjt-megamenu-dropdown-panel');
            if (Panels.length > 0) {
                if (eArgs.data.Self._AnimatedItem != null) {
                    eArgs.data.Self._AnimatedItem.stop(true, true);
                }
                eArgs.data.Self._AnimatedItem = jQuery(Panels[0]);
                if (options.fade && options.slide) {
                    jQuery(Panels[0]).animate({ opacity: 'toggle', height: 'toggle' }, options.animation_speed);
                }
                else if (options.fade) {
                    jQuery(Panels[0]).animate({ opacity: 'toggle' }, options.animation_speed);
                }
                else if (options.slide) {
                    jQuery(Panels[0]).animate({ height: 'toggle' }, options.animation_speed);
                }
                else {
                    jQuery(Panels[0]).hide();
                }
            }
        },

        destroy: function() {
            jQuery(this.element).html(this._baseHTML);
            jQuery.Widget.prototype.destroy.call(this);
        }


    }); // widget
})(jQuery);
