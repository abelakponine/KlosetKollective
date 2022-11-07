/*
* Glui Slider v1.0.0
* Author: Abel O. Akponine
* Facebook: http://www.facebook.com/exploxi
* Copyright © 2018
*/

( function($){
    $(document).ready(function(){
        
                    //defined object
                    var obj = {
                                  slider: $('.slider'),
                                  rowspan:$('.slider .rowspan'),
                                  grid:$('.slider .rowspan .grid')
                              };
                
                
                $('img').on('mousedown', function(event){
                    event.preventDefault();
                });
                
                /**** Scroll Slider (Touch and Mouse Event) ****/
                
                $('.slider,.slider .rowspan').on('mousedown touchstart', function(event){ //plugin start
                
                    //for public functions
                    var offset1 = (event.screenX || event.originalEvent.touches[0].screenX);
                    var offset3 = (event.screenY || event.originalEvent.touches[0].screenY);
                    var offsetXOrig = $(obj.rowspan).position().left;
                    var offsetYOrig = $(obj.rowspan).position().top;

                    //for private functions
                    var offset2 = (event.screenX || event.originalEvent.touches[0].screenX);
                    var offset4 = (event.screenY || event.originalEvent.touches[0].screenY);
                    
                        
                        //on mousemove and touchmove
                        $('.slider, .slider .rowspan').on('mousemove touchmove', function(event){

                            //change offset position on move
                            
                            offset2 = (event.screenX || event.originalEvent.touches[0].screenX);
                            offset4 = (event.screenY || event.originalEvent.touches[0].screenY);
                            var offsetDistX = offset2-offset1;
                            var offsetDistY = offset4-offset3;
                            var newOffsetX = (offsetDistX)+offsetXOrig;
                            var newOffsetY = (offsetDistY)+offsetYOrig;
                            
                            if (offsetDistX < 0 || offsetDistX > 0 && newOffsetX < 30){
                                $(obj.rowspan).css({'left': (newOffsetX),'transition-duration':'0.015s'});
                            
                            }
                        }); //move end
                        
                        
                        //on mouseup and touchend
                        $('html,.slider, .slider .rowspan').on('mouseup touchend', function(event){
                            
                            var offsetDistX = offset2-offset1;
                            var newOffsetXOrig = offsetXOrig+offsetDistX;
                            
                                                                                                            $(obj.rowspan).css({'left': (newOffsetXOrig),'transition-duration':'0.015s'});
                                  
                            
                            if (newOffsetXOrig/$(obj.grid).outerWidth() > -(Math.floor(-(newOffsetXOrig)/$(obj.grid).outerWidth())+0.25)){
                                $(obj.rowspan).css({'left': -(Math.floor(-(newOffsetXOrig)/$(obj.grid).outerWidth())*$(obj.grid).outerWidth())+'px','transition-duration':'0.1s'});
                            }
                            
                            if (newOffsetXOrig/$(obj.grid).outerWidth() <= -(Math.floor(-(newOffsetXOrig)/$(obj.grid).outerWidth())+0.25)){
                                $(obj.rowspan).css({'left': -(Math.ceil(-(newOffsetXOrig)/$(obj.grid).outerWidth())*$(obj.grid).outerWidth())+'px','transition-duration':'0.1s'});
                            }
                            
                            if (newOffsetXOrig/$(obj.grid).outerWidth() >= -(Math.floor(-(newOffsetXOrig)/$(obj.grid).outerWidth())+0.75) && offsetDistX > 0){
                                $(obj.rowspan).css({'left': -(Math.floor(-(newOffsetXOrig)/$(obj.grid).outerWidth())*$(obj.grid).outerWidth())+'px','transition-duration':'0.1s'});
                            }
                            
                            
                            
                            //avoid offset beginning and end distortion -- Distortion Start --
                            
                            if (newOffsetXOrig >= 0 && offsetDistX > 0){
                                $(obj.rowspan).css({'left':'0px','transition-duration':'0.1s'});
                            }
                            
                            
                            
                            if (newOffsetXOrig <= ($(obj.grid).outerWidth()*-3) && offsetDistX < 0){
                                $(obj.rowspan).css({'left':$(obj.grid).outerWidth()*-3+'px','transition-duration':'0.1s'});
                            }
                            
                            
                            // -- Distortion Ends --
                            
                            //turn off function on touchend and mouseup
                            $('html,.slider, .slider .rowspan').off('mousemove mouseup touchmove touchend');
                            
                        });
                        
                  
                
                }); //touchstart end.

               /*** End of Touch Scroll Slider ***/




               /*** Auto Slider (slideIn and slideOut) ***/
               
               
        
        function auto_slider(){

            $('.item-grid .grid').css({'opacity':'1','transition-duration':'0s','transition-delay':'0s'});

            var slideWidth = Math.floor($('.item-grid').outerWidth()/$('.item-grid .grid').outerWidth());
            var slideHeight = Math.floor($('.item-grid').outerHeight()/$('.item-grid .grid').outerHeight());

            for (var i = 0; i <= slideHeight-1; i++) {

                for (var j = slideWidth*i; j <= (slideWidth-1)+(i*slideWidth); j++) {
                    $('.item-grid .grid').eq(j).animate({'left':'0','position':'relative','transition-duration':'1s','transition-delay':i/2.5+'s'});
                    //$('.item-grid .grid').eq(j).delay(10000).animate({'left':'-100%','position':'relative','transition-duration':'1s','transition-delay':i/2.5+'s'});
                    //$('.item-grid .grid').eq(j).delay(800).animate({'left':'100%','position':'relative','transition-duration':'1s','transition-delay':'0s'});
                }
            }

            //$('.item-grid .grid').css({'opacity':'0','transition-duration':'1s','transition-delay':'10s'});
            
            
        }

        auto_slider();
        
        var aslide = setInterval(function(){
            auto_slider();
        },14000);
        
    
    
    });
      
})(jQuery);

// Developed by Glido Technologies © 2018
