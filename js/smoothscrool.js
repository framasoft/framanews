$(document).ready(function() {
    
    //
    // jQuery SmoothScroll | Version 13-4-11
    // based on http://blog.medianotions.de/en/articles/2009/smoothscroll-for-jquery
    // modified by Luc Didry <luc @ fiat-tux.fr>
    //

    $('.navbar li a').click(function(event) {
        event.preventDefault();

        // skip SmoothScroll on links inside sliders or scroll boxes also using anchors or if there is a javascript call
        if ($(this).parent().hasClass('scrollable_navigation') || $(this).attr('href').indexOf('javascript') > -1) {
            return;
        }
        // offset for scrollspy and navbar-fixed-top
        var offset = 39;

        // duration in ms
        var duration=800;

        // easing values: swing | linear
        var easing='swing';

        // get / set parameters
        var newHash=this.hash;
        var oldLocation=window.location.href.replace(window.location.hash, '');
        var newLocation=this;

        // make sure it's the same location        
        if (oldLocation+newHash==newLocation) {
            // get target
            var target=$(this.hash+', a[name='+this.hash.slice(1)+']').offset().top;

            // adjust target for anchors near the bottom of the page
            if (target > $(document).height()-$(window).height()) {
                target=$(document).height()-$(window).height();
            }

            target = target - offset;

            // animate to target and set the hash to the window.location after the animation
            $('html:not(:animated)').animate({ scrollTop: target}, duration, easing);
            $('body:not(:animated)').animate({ scrollTop: target}, duration, easing);
        }
    });

});
