$('.close-top-nav').click(function() {
    $('.top-header').slideUp();

});

$(window).scroll(function(){
    if($(window).width() > 767){
        if ($(window).scrollTop() >= 75) {
            $('.bottom-header').addClass('fixed-header');
        }
        else {
            $('.bottom-header').removeClass('fixed-header');

        }
    }

});

$(document).ready(function(){
    if($(window).width() > 767){
        $(".header-search input").focusin(function(){
            $(".header-search img").addClass("active");
            $(this).parent().addClass("active");
        });
        $(".header-search input").focusout(function(){
            $(".header-search img").removeClass("active");
            $(this).parent().removeClass("active");
        });
    }

});

(function($) { // Begin jQuery
    $(function() { // DOM ready
        // If a link has a dropdown, add sub menu toggle.
        $('.drop-btn').click(function(e) {
            $(this).siblings('.nav-dropdown').toggle();
            // Close one dropdown when selecting another
            $('.nav-dropdown').not($(this).siblings()).hide();
            e.stopPropagation();
        });
        // Clicking away from dropdown will remove the dropdown class
        $('.nav-dropdown').click(function(e) {
            e.stopPropagation();
        });
        $('html').click(function() {
            $('.nav-dropdown').hide();
        });

    }); // end DOM ready
})(jQuery); // end jQuery

// ----------------------------------



const menu = document.querySelector('#nav-toggle');
const menuLinks = document.querySelector('.mobile-nav');
const close = document.querySelector('.close');
const overlay = document.querySelector('.overlay');


menu.addEventListener('click', function() {
    menuLinks.classList.toggle('active')
    $('.overlay').fadeIn()
    $('body').css("position" , "fixed")

})
close.addEventListener('click', function() {
    menuLinks.classList.remove('active')
    $('.overlay').fadeOut(100)
    $('body').css("position" , "relative")
})
overlay.addEventListener('click', function() {
    menuLinks.classList.remove('active')
    $('.overlay').fadeOut(100)
    $('body').css("position" , "relative")
})

// -------------------------------
