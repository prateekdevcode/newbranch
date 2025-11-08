/*!
*
* ColorPick jQuery plugin
* https://github.com/philzet/ColorPick.js
*
* Copyright (c) 2017 Phil Zet (a.k.a. Philipp Zakharchenko)
* Licensed under the MIT License
*
*/
(function( $ ) {

    $.fn.colorPick = function(config) {

        return this.each(function() {
            new $.colorPick(this, config || {});
        });

    };

    $.colorPick = function (element, options) {
        options = options || {};
        this.options = $.extend({}, $.fn.colorPick.defaults, options);
        if(options.str) {
            this.options.str = $.extend({}, $.fn.colorpickr.defaults.str, options.str);
        }
        $.fn.colorPick.defaults = this.options;
        this.color   = this.options.initialColor.toUpperCase();
        this.element = $(element);

        var dataInitialColor = this.element.data('initialcolor');
        if (dataInitialColor) {
            this.color = dataInitialColor;
            this.appendToStorage(this.color);
        }

        var uniquePalette = [];
        $.each($.fn.colorPick.defaults.palette.map(function(x){ return x.toUpperCase() }), function(i, el){
            if($.inArray(el, uniquePalette) === -1) uniquePalette.push(el);
        });

        this.palette = uniquePalette;

        return this.element.hasClass(this.options.pickrclass) ? this : this.init();
    };

    $.fn.colorPick.defaults = {
        'initialColor': '#3498db',
        'paletteLabel': 'Default palette:',
        'allowRecent': true,
        'recentMax': 5,
        'allowCustomColor': false,
       // 'palette': ["#1abc9c", "#16a085", "#2ecc71", "#27ae60", "#3498db", "#2980b9", "#9b59b6", "#8e44ad", "#34495e", "#2c3e50", "#f1c40f", "#f39c12", "#e67e22", "#d35400", "#e74c3c", "#c0392b", "#ecf0f1", "#bdc3c7", "#95a5a6", "#7f8c8d"],
       'palette': ["#FFFFFF", "#EFECE8", "#EBE8E5", "#DCD3CE", "#D1C8C4", "#CDC4C1", "#C4BBBA", "#BCB3B2", "#B2A9A7", "#ADA4A1", "#9D8E89", "#938580", "#231F20", "#EFEFEA", "#E5E5E1", "#DCD9D5", "#D6D6D1", "#D2D2CC", "#BDBDBA", "#B4B1B1", "#ADACAD", "#A5A4A5", "#919192","#888789", "#FAC5BD", "#FAC6CA", "#EF4060", "#D93957", "#ED1C24", "#CE183B", "#C91150", "#C60A49", "#DB5C34", "#C04B36","#8F3D1D", "#801320", "#FDDDD5", "#FABEAB", "#F7A1A4", "#CA455A", "#E21760", "#B32220", "#C4114F", "#B4114B", "#BB0C4E", "#B71243", "#B3304C", "#A30134", "#FFD999", "#FFD76B", "#FFF685", "#FFF453","#FFF07F", "#FFEC00", "#FFE100", "#FFF203", "#FFE512", "#FFDD00", "#FFDA00", "#FFC824", "#FFC820", "#FDB913", "#FDB940", "#DA9D13", "#EEB111", "#FBB034", "#ED9D19", "#E39C16", "#F5A200", "#BB8D24", "#C0900C", "#BA800E", "#FED3AF", "#FAB27B", "#F58220", "#F68B26", "#F68B24", "#E87C1E", "#F57F31", "#E9721F", "#E1701E", "#F47920", "#A7611D", "#A84A1D", "#FED3A4", "#FCBB67", "#FAB27D", "#FAAC65", "#FDB84F", "#E6851C", "#E37F1C", "#ED921B", "#AE6D19", "#C06915", "#CB7218", "#7D4600", "#B9DA8B", "#CDE18E", "#AFD465", "#A2C937", "#82A52C", "#6A9A2F", "#95C93D", "#72BF44", "#5C9934", "#437E2A", "#00B052", "#009445", "#E7EFB8", "#D1E391", "#afd464", "#A6CE39", "#8CA828", "#83B93B", "#6A9A2E", "#637612", "#00702F", "#007A48", "#00AF6B", "#009D5B", "#ABE1FA", "#77CDD6", "#4FB4BB", "#8BD3DA", "#199FA7", "#007F7D", "#005F5A", "#00B5AD", "#00AAA2", "#008A84", "#00857D", "#27BDBE", "#4DBEEE", "#009ADA", "#007DC5", "#0072B4", "#006497", "#006AB0", "#004579", "#003965", "#002B5C", "#00346D", "#002F67", "#001A4B", "#CEB6D8", "#A880B9", "#9665AA", "#975BA5", "#887EBB", "#645FAA", "#5E50A1", "#6950A1", "#893494", "#9B5BA5", "#6C1B78", "#650360", "#B19ACA", "#8D64AA", "#8672B4", "#583F99", "#5C2D91", "#49176D", "#711471", "#56004E", "#16145F", "#201D70", "#150958", "#0D004C", "#F26D65", "#EE4D9B", "#00B38A", "#21409A", "#16BECF", "#00B7CE", "#006FB7", "#F7941D", "#FFF200", "#BD60A5", "#EC008C", "#00AEEF" ],
       'pantone' :['cl102', 'cp20'],
        'onColorSelected': function() {
            this.element.css({'backgroundColor': this.color, 'color': this.color});

        }
    };

    $.colorPick.prototype = {

        init : function(){

            var self = this;
            var o = this.options;

            $.proxy($.fn.colorPick.defaults.onColorSelected, this)();

            this.element.click(function(event) {
                event.preventDefault();
                self.show(event.pageX, event.pageY);

                $('.customColorHash').val(self.color);

                $('.colorPickButton').click(function(event) {
					self.color = $(event.target).attr('hexValue');
					self.appendToStorage($(event.target).attr('hexValue'));
					self.hide();
					$.proxy(self.options.onColorSelected, self)();
					return false;
            	});
                $('.customColorHash').click(function(event) {
                    return false;
                }).keyup(function (event) {
                    var hash = $(this).val();
                    if (hash.indexOf('#') !== 0) {
                        hash = "#"+hash;
                    }
                    if (/(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)/i.test(hash)) {
                        self.color = hash;
                        self.appendToStorage(hash);
                        $.proxy(self.options.onColorSelected, self)();
                        $(this).removeClass('error');
                    } else {
                        $(this).addClass('error');
                    }
                });

                return false;
            }).blur(function() {
                self.element.val(self.color);
                $.proxy(self.options.onColorSelected, self)();
                self.hide();
                return false;
            });

            $(document).on('click', function(event) {
                self.hide();
                return true;
            });

            return this;
        },

        appendToStorage: function(color) {
	        if ($.fn.colorPick.defaults.allowRecent === true) {
	        	var storedColors = JSON.parse(localStorage.getItem("colorPickRecentItems"));
				if (storedColors == null) {
		     	    storedColors = [];
	        	}
				if ($.inArray(color, storedColors) == -1) {
		    	    storedColors.unshift(color);
					storedColors = storedColors.slice(0, $.fn.colorPick.defaults.recentMax)
					localStorage.setItem("colorPickRecentItems", JSON.stringify(storedColors));
	        	}
	        }
        },

        show: function(left, top) {

            $("#colorPick").remove();

	        $("body").append('<div id="colorPick" style="display:none;top:' + top + 'px;left:' + left + 'px"><span>'+$.fn.colorPick.defaults.paletteLabel+'</span></div>');
	        jQuery.each(this.palette, function (index, item) {
				$("#colorPick").append('<div class="colorPickButton" hexValue="' + item + '" style="background:' + item + '" title="' + item + '"></div>');
			});
            jQuery.each(this.pantone, function (index, item) {
                alert();
                $("#colorPick").append('<div class="colorPickButton"><span>'+ item +'</span></div>');
            });
            
            if ($.fn.colorPick.defaults.allowCustomColor === true) {
                $("#colorPick").append('<input type="text" style="margin-top:5px" class="customColorHash" />');
            }
			if ($.fn.colorPick.defaults.allowRecent === true) {
				$("#colorPick").append('<span style="margin-top:5px">Recent:</span>');
				if (JSON.parse(localStorage.getItem("colorPickRecentItems")) == null || JSON.parse(localStorage.getItem("colorPickRecentItems")) == []) {
					$("#colorPick").append('<div class="colorPickButton colorPickDummy"></div>');
				} else {
					jQuery.each(JSON.parse(localStorage.getItem("colorPickRecentItems")), (index, item) => {
		        		$("#colorPick").append('<div class="colorPickButton" hexValue="' + item + '" style="background:' + item + '" title="' + item + '"></div>');
                        if (index == $.fn.colorPick.defaults.recentMax-1) {
                            return false;
                        }
					});
				}
			}
	        $("#colorPick").fadeIn(200);
	    },

	    hide: function() {
		    $( "#colorPick" ).fadeOut(200, function() {
			    $("#colorPick").remove();
			    return this;
			});
        },

    };

}( jQuery ));
