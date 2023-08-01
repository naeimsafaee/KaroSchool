$(document).ready(function(){
    var owl = $('#top-owl-carousel');
    owl.owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        dots: false,
        items: 1,
        // autoplay:true,
        // autoplayTimeout:4000,
        // autoplayHoverPause:true
    });
    owl.on('changed.owl.carousel', function(e) {
        owl.trigger('stop.owl.autoplay');
        owl.trigger('play.owl.autoplay');
    });
    // Custom Button
    $('#top-owl-carousel-btn .top-next').click(function() {
        owl.trigger('next.owl.carousel');
    });
    $('#top-owl-carousel-btn .top-prev').click(function() {
        owl.trigger('prev.owl.carousel');
    });

});

$(document).ready(function(){
    var owl = $('#bottom-owl-carousel');
    owl.owlCarousel({
        loop:true,
        margin:0,
        nav:false,
        dots: false,
        responsive : {
            // breakpoint from 0 up
            0 : {
                items: 1,

            },
            // breakpoint from 480 up
            480 : {
                items: 2,
            },
            // breakpoint from 768 up
            768 : {
                items: 4,
            }

        }
    });
    owl.on('changed.owl.carousel', function(e) {
        owl.trigger('stop.owl.autoplay');
        owl.trigger('play.owl.autoplay');
    });
    // Custom Button
    $('#bottom-owl-carousel-btn .bottom-next').click(function() {
        owl.trigger('next.owl.carousel');
    });
    $('#bottom-owl-carousel-btn .bottom-prev').click(function() {
        owl.trigger('prev.owl.carousel');
    });

});
