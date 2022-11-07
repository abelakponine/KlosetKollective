/*!
* Glui AppJs v1.0
* Author: Abel O. Akponine
* Facebook: http://www.facebook.com/exploxi
* Copyright © 2018
*/

( function($){
    
    $(document).ready(function(){

        $('.navOffset').css({'margin-top':$('.nav').outerHeight()+'px'});
        $('.navOffsetx2').css({'margin-top':$('.nav').outerHeight()*2+'px'});
        $('.navOffsetx3').css({'margin-top':$('.nav').outerHeight()*3+'px'});
        $('.headerOffset').css({'margin-top':$('header,.header,#header').outerHeight()+'px'});
                    
        $('.slider .rowspan').attr({'style':'width: '+$('.slider').outerWidth()*4+'px !important'});
        
    
    });
    
    $(window).on('resize',function(){
        
        $('.navOffset').css({'margin-top':$('.nav').outerHeight()+'px'});
        $('.navOffsetx2').css({'margin-top':$('.nav').outerHeight()*2+'px'});
        $('.navOffsetx3').css({'margin-top':$('.nav').outerHeight()*3+'px'});
        $('.headerOffset').css({'margin-top':$('header,.header,#header').outerHeight()+'px'});
        
    });
    
})(jQuery);

