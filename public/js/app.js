jQuery(document).ready(function($) {


// main: tournament tabs
    $('ul.c_main_info-tabs__caption').on('click', 'li:not(.active)', function() {
        $(this)
            .addClass('active').siblings().removeClass('active')
            .closest('div.c_main_info-tabs').find('div.c_main_info-tabs__content').removeClass('active').eq($(this).index()).addClass('active');
    });


// accordion - About page
    $('.c_about-title').on('click', function(event) {
        event.preventDefault();
        var parentAbout = $(this).parent();
        parentAbout.addClass('active');
        parentAbout.siblings().removeClass('active');
    });

// select styling
    $('input, select').styler({
        selectSearch: true
    });


//
// popup
//
    $('.overlay, .popup-close').on('click', function(){
        $('.popup').fadeOut();
        $('.overlay').fadeOut();
    });
    $('.action').on('click', function(){
        var event = $(this).data('event');

        $('.overlay').fadeIn();
        $('.popup-' + event).centered_popup();
        $('.popup-' + event).fadeIn();
        return false;
    });

// Маска для телефона
  $("[type=tel]").mask("79999999999");


// Кнопка "Наверх"
    $(window).scroll(function(){
        if (jQuery(document).scrollTop() > 100) {
            jQuery('.intop').fadeIn();
        } else {
            jQuery('.intop').fadeOut();
        }
    });
    $('.intop').click(function(){
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });



});


// Центрируем эелемент
$.fn.centered_popup = function(top) {
    this.css('position', 'absolute');
    this.css('left', ($(window).outerWidth() - this.outerWidth()) / 2 + $(window).scrollLeft() + 'px');
    if( top == 1 )
        this.css('top', $(window).scrollTop() + 'px');
    else
        this.css('top', ($(window).outerHeight() - this.outerHeight()) / 2 + $(window).scrollTop() + 'px');
}