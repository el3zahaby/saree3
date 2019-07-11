$(function () {

    console.log('run');

    $(".owl-carousel").owlCarousel({
        items : 1,
        rtl:true,
        autoplay : true,
        autoplayTimeout : 1000,
        animateOut: 'fadeOut'
    });

});
