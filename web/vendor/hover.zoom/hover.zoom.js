(function($){

    $.fn.extend({ 

        hoverZoom: function(settings) {
 
            var defaults = {
                overlay: true,
                overlayColor: '#2e9dbd',
                overlayOpacity: 0.7,
                zoom: 25,
                speed: 300
            };
             
            var settings = $.extend(defaults, settings);
         
            return this.each(function() {
            
                var s = settings;
                var hz = $(this);
                var image = $('img', hz);

                var width = image.width();
                var height = image.height();

                image.on('load',function() {
                    width = $(this).width();
                    height = $(this).height();
                }); 

                if(s.overlay === true) {
                    $(this).parent().append('<div class="zoomOverlay" />');
                    $(this).parent().find('.zoomOverlay').css({
                        opacity:0, 
                        display: 'block', 
                        backgroundColor: s.overlayColor
                    }); 
                }
            
                
            
                $(this).fadeIn(1000, function() {
                    $(this).parent().css('background-image', 'none');
                    hz.hover(function() {
                        $('img', this).stop().animate({
                            height: height + s.zoom,
                            marginLeft: -(s.zoom),
                            marginTop: -(s.zoom)
                        }, s.speed);
                        if(s.overlay === true) {
                            $(this).parent().find('.zoomOverlay').stop().animate({
                                opacity: s.overlayOpacity
                            }, s.speed);
                        }
                    }, function() {
                        $('img', this).stop().animate({
                            height: height,
                            marginLeft: 0,
                            marginTop: 0
                        }, s.speed);
                        if(s.overlay === true) {
                            $(this).parent().find('.zoomOverlay').stop().animate({
                                opacity: 0
                            }, s.speed);
                        }
                    });
                });
                

            });
        }
    });
})(jQuery);