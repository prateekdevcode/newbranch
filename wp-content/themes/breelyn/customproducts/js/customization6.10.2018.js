
var toolsList = jQuery('.customization-point ul li').length;
var garmentsList = jQuery('.garments-list li').length;
var designList = jQuery('.design-list li').length;
var logoList = jQuery('.logo-list li').length;
var txtList = jQuery('.name-list li:nth-child(2)').find('button').length;
console.log('text btn ' + txtList);

var winHeight =jQuery(window).outerHeight();
var popHeight =jQuery('#popups').outerHeight();
var popFall =  winHeight/2 - popHeight/2;
var toolWidth = jQuery('.customization-point').outerWidth();

var msg = '';
//console.log(winHeight);

jQuery(window).on('load', function(){

  // page pre loader
    jQuery("#status").fadeOut();
    jQuery("#preloader").delay(1000).fadeOut("slow");


  for(i=0; i<=toolsList;i++){
   jQuery('.customization-point ul li').eq(i+1).addClass('disabled');
}

 for(i=0;i<=garmentsList;i++){
  jQuery('.garments-list li').eq(i).children().attr('data-val', i+1);
 }

for(i=0;i<=designList;i++){
  jQuery('.design-list li').eq(i).children().attr('data-val', i+1);
}
for(i=0;i<=logoList;i++){
  jQuery('.logo-list li').eq(i).children().attr('data-val', i+1);
}

for(i=0;i<=txtList;i++){
  jQuery('.name-list').eq(i).children('li:nth-child(2)').children('button').attr('data-val', i+1);
}


jQuery('.customize-content .content ul.dropdown-menu li').each(function(index, el) {
   var f= jQuery(this).children('a').attr('data-family');
   
   jQuery(this).children('a').css('font-family',f);


});



//color pallete


jQuery('#colorPick .colorPickButton').each(function(){

    var hxVal= jQuery(this).attr('hexvalue');
   // alert(hxVal);

    hxVal= hxVal.split('#')[1];

    jQuery('.colorPickButton').attr('title', hxVal);
});




jQuery('.customization-point').css({'height':winHeight});  // window height goes in tools bar
jQuery('.customize-content').css({'height':winHeight});  // window height goes in tools customize bar
jQuery('.design-area').css({'height':winHeight});  // window height goes in main design area
jQuery('.customize-content').css({'left': toolWidth}); // tool bar initial left position

});

// customize content area show/off

jQuery(document).ready(function(){
   jQuery('.cross').on('click', function(){
     //alert('hi');
     jQuery(this).parent().animate({
     	left: -100 + '%'
   },500);

   jQuery('.customization-point ul li').removeClass('active');   

    jQuery('.design-area').animate({
    	width: 85 + '%'
    },500);

 });

// add active class ij design tools
jQuery(document).on('click', '.customization-point ul li a', function(event){
	  event.preventDefault();
    //jQuery(".demo").customScrollbar();
  });

/* *** categories section *** */


var categoriesSelected;
var dataId;
var categoriesSelected;
var logoSelected;

jQuery(document).on('click', '#categories a',  function(){
  
   customizeContentOpen();
   
   jQuery('.customization-point ul li').removeClass('active');
   jQuery(this).parent().addClass('active');
   jQuery(this).parent().next().removeClass('disabled');
   categoriesSelected= $('div').data('categoriesSelected'); 
   //console.log(categoriesSelected);
   if(categoriesSelected != undefined){
     dataId = jQuery(this).attr('data-target');
     jQuery('.customize-content .content').fadeOut(400); 
     jQuery('#' + dataId).fadeIn(400);
     //jQuery(".demo").customScrollbar();
   }

});

/* *** design section *** */

jQuery(document).on('click', '#design a',  function(){
   categoriesSelected= $('div').data('categoriesSelected'); 
   //jQuery(".demo").customScrollbar();
   if(categoriesSelected==undefined){
      msg = 'Please select a category first';
     openPopup(msg);
     return false;
     //alert('not defined');
   }else{
    customizeContentOpen();
     jQuery('.customization-point ul li').removeClass('active');
     jQuery(this).parent().addClass('active');
    //alert('defined');
      dataId= jQuery(this).attr('data-target');
  // console.log(dataId);
     jQuery('.customize-content .content').fadeOut(400); 
     jQuery('#' + dataId).fadeIn(400);
     //jQuery(".demo").customScrollbar();
     
   }

});


/* *** logo section *** */

jQuery(document).on('click', '#logo a',  function(){
   designSelected= $('div').data('designSelected');
   
   console.log('design ' + designSelected);
   
  //jQuery(".demo").customScrollbar();
   if(designSelected==undefined){

    if(jQuery('#design').hasClass('disabled')){
      msg = 'Please select a categories and a design first';
    }else{
      msg = 'Please select a design first';
    }
      
     openPopup(msg);
     return false;
     //alert('not defined');
   }else{
    customizeContentOpen();
     jQuery('.customization-point ul li').removeClass('active');
     jQuery(this).parent().addClass('active');
     dataId= jQuery(this).attr('data-target');
     jQuery('.customize-content .content').fadeOut(400); 
     jQuery('#' + dataId).fadeIn(400);
    // jQuery(".demo").customScrollbar();



   }
});

/* *** text section *** */

jQuery(document).on('click', '#text a',  function(){
 // jQuery(".demo").customScrollbar();

   logoSelected= $('div').data('logoSelected');
   console.log('logo ' + logoSelected);
   if(logoSelected==undefined){

    if(jQuery('#design').hasClass('disabled')){
      msg = 'Please select a categories, a design and a logo first';
    }
    else if(jQuery('#logo').hasClass('disabled')){
      msg = 'Please select a design and a logo first';
    }else{
      msg = 'Please select a logo first';
    }
    openPopup(msg);
    return false;
   }else{
    customizeContentOpen();
     jQuery('.customization-point ul li').removeClass('active');
     jQuery(this).parent().addClass('active');
     dataId= jQuery(this).attr('data-target');
     jQuery('.customize-content .content').fadeOut(400); 
     jQuery('#' + dataId).fadeIn(400);
    // jQuery(".demo").customScrollbar();
   }

});




/* ***** Feature Section ***** */


jQuery(document).on('click', '#text a',  function(){
 
 // jQuery(".demo").customScrollbar();
 logoSelected= $('div').data('logoSelected');


});








//customize content active

//var proId="";

jQuery(document).on('click', '.customize-content .content ul li a, .name-list li:nth-child(2) button', function(e){
  
  e.preventDefault();
  proId= jQuery(this).attr('data-val');
 var textId;
 var txtDataVal= jQuery('.name-list li:nth-child(2)').children('input').val();

 if(txtDataVal=''){
   // alert('no value')
 }else{
   //alert('has value')
 }

 if(jQuery('.name-list li:nth-child(2) button')){
    textId= jQuery(this).attr('data-val');
 }


  //console.log(proId);
  //jQuery('.customize-content .content ul li').removeClass('active-garments')
  //jQuery(this).parent().addClass('active-garments');
    
   switch(jQuery(this).parent().parent().parent().attr('id')){

      case 'id-1':
	  
      jQuery('div').data('categoriesSelected', proId);
      jQuery(this).parent().siblings().removeClass('active');
      jQuery(this).parent().addClass('active');
      jQuery('#design').removeClass('disabled');
      //alert(proId);
      break;

      case 'id-2':
	 
       jQuery('div').data('designSelected', proId);
       jQuery(this).parent().siblings().removeClass('active');
       jQuery(this).parent().addClass('active');
       jQuery('#logo').removeClass('disabled');
       //alert(proId);
      break;

       case 'id-3':
       jQuery('div').data('logoSelected', proId);
       jQuery(this).parent().siblings().removeClass('active');
       jQuery(this).parent().addClass('active');
       jQuery('#text').removeClass('disabled');
       //alert(proId);
      break;

       case 'id-4':
       jQuery('div').data('textSelected', textId);
       //jQuery(this).parent().siblings().removeClass('active');
       //jQuery(this).parent().addClass('active');
       jQuery('#feature').removeClass('disabled');
       //alert(proId);
      break;
   } 
 
});




// open/close color picker


//jQuery('.design-list li').on('click', function(){
 jQuery(".design-list").on("click","li",function(){
  jQuery(this).parent().fadeOut(500);
  jQuery('.color-picker-container').fadeIn(500); 
  jQuery('.back').css({'opacity': '1','transition':'all .5s ease-in-out'}); 
});

jQuery('.back').on('click', function(){
  jQuery('.design-list').fadeIn(500);
  jQuery('.color-picker-container').fadeOut(500); 
  jQuery('.back').css({'opacity': '0','transition':'all .5s ease-in-out'}); 
}); 


// popup close

jQuery('#popups .close').on('click', function(e){
  e.preventDefault();
  closePopup()
});

jQuery('.popoverlay').on('click', function(e){
  closePopup()
});



// description open 

var aw=jQuery('.customization-point').outerWidth();
var bw= jQuery('.customize-content').outerWidth();
var cw=aw+bw;

jQuery('.description-pop').css('left', cw);

/*jQuery('.customize-content .content ul.garments-list li').mouseenter(function(){

  jQuery('.description-pop').fadeIn(500);
  //jQuery(this).children('.description-pop').fadeIn(500);
});
jQuery('.customize-content .content ul.garments-list li').mouseleave(function(){

 jQuery('.description-pop').fadeOut(500);
//jQuery(this).children('.description-pop').fadeOut(500);
});*/



jQuery(document).on('click', '.cross-img', function(e){
  //alert('click')
  jQuery(this).parent().remove();
  jQuery('.uploadimgsec input[name=user-file]').empty()

 
});


// open color picker 

var pickerHeight = jQuery('#colorPick').outerHeight();




jQuery(document).on('click', '.colorPickSelector1', function(){
	//var pickerPos  = jQuery('#colorPick').offset().top;
	//var ap = pickerHeight + pickerPos;
	alert(pickerHeight);
	//if(ap > winHeight){
		
		//jQuery('#colorPick').css({'top':'unset', 'bottom':0});
	//}
});





});  // document ready function



// text preview

jQuery('#text-string').keyup(function(event){
  

   var textVal= jQuery(this).val();
   //console.log(textVal);
   jQuery(this).parent().siblings('.text-preview').css('display','block');
   jQuery(this).parent().siblings('.text-preview').children('span').text(textVal);


});
jQuery('#text-string-back').keyup(function(event){
  

   var textVal= jQuery(this).val();
   //console.log(textVal);
   jQuery(this).parent().siblings('.text-preview').css('display','block');
   jQuery(this).parent().siblings('.text-preview').children('span').text(textVal);


});


jQuery('.customize-content .content ul.dropdown-menu li a').on('click', function(){

   var fm = jQuery(this).attr('data-family');
   var lt= jQuery(this).text();

   jQuery(this).parent().parent().siblings('button').children('span.defined-font').html(lt);
  // jQuery('#font-family-back span.defined-font').html(lt);
   //alert(fm);
   jQuery(this).css('font-family', fm);
   jQuery(this).parent().parent().parent().siblings('.text-preview').children('span').css('font-family', fm);

});






// design tools' functions


// Customize Content Open
function customizeContentOpen(){
  var pw= jQuery('.customization-point').outerWidth();
	jQuery('.customize-content').animate({
		left: pw
	},500);

	jQuery('.design-area').animate({
    	width: 75 + '%'
    },500);
}

//  open/close popup


function openPopup(msg){
   jQuery('#popups').css({'top':popFall, 'opacity':'1',  'transition':'all .5s ease-in-out'});
   var nmsg = '<p id="text">'+msg+'</p>';
    jQuery('.popupbody').html(nmsg);
   jQuery('.popoverlay').fadeIn(500);
}

function closePopup(){
  jQuery('#popups').css({'top':'-100%', 'opacity':'0',  'transition':'all .5s ease-in-out'});
  jQuery('.popoverlay').fadeOut(500);

}

//canvas resizing 

function resize(){ 


var areaHeight =jQuery('#drawingArea').outerHeight();
var areaWidht = jQuery('#drawingArea').outerWidth();
console.log(areaHeight);

jQuery('#drawingArea canvas').attr({
  width: areaWidht,
  height: areaHeight
});
   

}
resize();

jQuery(window).on('resize', function(){
resize();

});

  








