$(document).ready(() => {

    $('.up').click(() => {
        $('body, html').animate({
            scrollTop: '0px'
        }, 300);
    });

    $(window).scroll(() => {
        if ($(this).scrollTop() > 0) {
            $('.up').fadeIn(1500);
        } else {
            $('.up').fadeOut(300);
        }
    });

});
