// JavaScript Document //


// navbar toggle //


jQuery('[data-toggle="slide-collapse"]').on('click', function() {
  jQuerynavMenuCont = jQuery(jQuery(this).data('target'));
  jQuerynavMenuCont.animate({
    'width': 'toggle'
  }, 350);
  jQuery(".menu-overlay").fadeIn(500);

});
jQuery(".menu-overlay").click(function(event) {
  jQuery(".navbar-toggle").trigger("click");
  jQuery(".menu-overlay").fadeOut(500);
});
jQuery("#billing_address_1").val(jQuery("#billing_address_3").val());
jQuery("#billing_address_3").on("keyup",function(){
	jQuery("#billing_address_1").val(jQuery(this).val());
})




  jQuery('.my_src').on('click',function($){
    // jQuery('.search-open').show();
    jQuery('.search-wrap').addClass('search-open')
  });




    jQuery(document).ready(function(){
    var winWidth= jQuery(window).width();
  
    if(winWidth <= 767){

    jQuery('<span class="angle-down"><i class="fa fa-angle-down"></i></span>').appendTo('#slide-navbar-collapse ul#menu-header-menu li.menu-item-has-children');
  };


  // jQuery(document).on('click', '.angle-down', function(e){
  //   //e.stopPropagation();
  //   //alert('hi');
  //   //jQuery('#slide-navbar-collapse ul#menu-header-menu > li.menu-item-has-children ul.sub-menu').toggle;

  //     jQuery('#slide-navbar-collapse ul#menu-header-menu > li.menu-item-has-children ul.sub-menu').slideUp('medium').removeClass('open');
  //     jQuery('.angle-down i').removeClass('fa-angle-up').addClass('fa-angle-down');

  //   if(jQuery(this).siblings('.sub-menu').is(':visible')){
  //     //alert('visible');
  //     //jQuery('#slide-navbar-collapse ul#menu-header-menu > li.menu-item-has-children ul.sub-menu').slideUp('medium').removeClass('open');
  //     //jQuery('.angle-down i').removeClass('fa-angle-up').addClass('fa-angle-down');
  //   	jQuery(this).siblings('.sub-menu').slideUp('medium').removeClass('open');
  //   	jQuery(this).children('i').addClass('fa-angle-up').removeClass('fa-angle-down');
  //   }else{
  //   	//alert('invisible');
  //   	jQuery(this).siblings('.sub-menu').slideDown('medium').addClass('open');
  //   	jQuery(this).children('i').addClass('fa-angle-up').removeClass('fa-angle-down');
  //   }
    
  // });



  jQuery(document).on('click', '.angle-down', function(e){    

    jQuery(this).parent().siblings().find('ul').slideUp().removeClass('hasOpened');
    jQuery(this).prev('ul.sub-menu').slideToggle().toggleClass('hasOpened');
    
  })
  
  
});




    