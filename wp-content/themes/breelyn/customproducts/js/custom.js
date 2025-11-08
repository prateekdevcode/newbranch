// JavaScript Document //

jQuery(document).ready(function() {

  jQuery("ul.products + .storefront-sorting").css("display", "none");
  

    var navbar = jQuery('#navbar-main'),

    		distance = navbar.offset().top,

        $window = jQuery(window);



    $window.scroll(function() {

        if ($window.scrollTop() >= distance) {

            navbar.removeClass('navbar-fixed-top').addClass('navbar-fixed-top');

          	jQuery("body").css("padding-top", "70px");

        } else {

            navbar.removeClass('navbar-fixed-top');

            jQuery("body").css("padding-top", "0px");

        }

    });

});



// nav menu //



jQuery('ul.nav li.dropdown').hover(function() {

  jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);

}, function() {

  jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);

});



//testimonial carousel //



jQuery('#testi-slider').owlCarousel({

  loop: true,

  margin: 10,

  nav: true,

  navText: [

    "<i class='fa fa-angle-left'></i>",

    "<i class='fa fa-angle-right'></i>"

  ],

  autoplay: true,

  autoplayHoverPause: true,

  responsive: {

    0: {

      items: 1

    },

    600: {

      items: 1

    },

    1000: {

      items: 1

    }

  }

})



// catagories //



jQuery('#catagories-slider').owlCarousel({

  loop: true,

  margin: 15,

  nav: true,

  navText: [

    "<i class='fa fa-angle-left'></i>",

    "<i class='fa fa-angle-right'></i>"

  ],

  autoplay: true,

  autoplayHoverPause: true,

  responsive: {

    0: {

      items: 1

    },

    600: {

      items: 2

    },

    1000: {

      items: 4

    }

  }

})



// feature //



jQuery('#feature-slider').owlCarousel({

  loop: true,

  margin: 35,

  nav: true,

  navText: [

    "<i class='fa fa-angle-left'></i>",

    "<i class='fa fa-angle-right'></i>"

  ],

  autoplay: true,

  autoplayHoverPause: true,

  responsive: {

    0: {

      items: 1

    },

    600: {

      items: 2

    },

    1000: {

      items: 3

    }

  }

})



// related Product //



jQuery('#related-slider').owlCarousel({

  loop: true,

  margin: 10,

  nav: true,

  navText: [

    "<i class='fa fa-angle-left'></i>",

    "<i class='fa fa-angle-right'></i>"

  ],

  autoplay: true,

  autoplayHoverPause: true,

  responsive: {

    0: {

      items: 1

    },

    600: {

      items: 2

    },

    1000: {

      items: 4

    }

  }

})



/* banner slider end*/



//thumbnail carousel //



jQuery('#product-thumb-carousel').owlCarousel({

  loop: true,

  margin: 10,

  nav: true,

  navText: [

    "<i class='fa fa-angle-left'></i>",

    "<i class='fa fa-angle-right'></i>"

  ],

  autoplay: false,

  autoplayHoverPause: true,

  responsive: {

    0: {

      items: 2

    },

    600: {

      items: 3

    },

    1000: {

      items: 4

    }

  }

})



//detail carousel //



/*jQuery('#product-detail-carousel').owlCarousel({

  loop: true,

  margin: 10,

  nav: true,

  navText: [

    "<i class='fa fa-angle-left'></i>",

    "<i class='fa fa-angle-right'></i>"

  ],

  autoplay: false,

  autoplayHoverPause: true,

  responsive: {

    0: {

      items: 1

    },

    600: {

      items: 1

    },

    1000: {

      items: 1

    }

  }

})*/



jQuery(document).ready(function(){

  

  var owl_1 = jQuery('#owl-1');

  var owl_2 = jQuery('#owl-2');

  

  owl_1.owlCarousel({

    loop:true,
    margin:0,
    nav:true,
    navText: [
     "<i class='fa fa-angle-left'></i>",
     "<i class='fa fa-angle-right'></i>"
    ],
    items: 1,
    dots: false

  });

  

  owl_2.owlCarousel({
    loop:true,
    margin:20,
    nav: true,
    navText: [
    "<i class='fa fa-angle-left'></i>",
    "<i class='fa fa-angle-right'></i>"
  ],
    items: 4,
    dots: false

  });

  

  owl_2.find(".item").click(function(){

    var slide_index = owl_2.find(".item").index(this);

    owl_1.trigger('to.owl.carousel',[slide_index,300]);

  });

  

  // Custom Button

  jQuery('.customNextBtn').click(function() {

    owl_1.trigger('next.owl.carousel',500);

  });

  jQuery('.customPreviousBtn').click(function() {

    owl_1.trigger('prev.owl.carousel',500);

  }); 

  

 

 

});



 



jQuery(function() {

  

  var tobi = new Tobi()





// Add elements dynamically

tobi.add(document.querySelector('.lightbox2'))







 /* $('.owl-carousel').owlCarousel({

    items: 1,

    loop: true,

    margin: 10,

    nav: true,

    onTranslated: function() {

    

      $zoom.destroy().magnify();

    }

  });

  var $zoom = $('.zoom').magnify();*/

})