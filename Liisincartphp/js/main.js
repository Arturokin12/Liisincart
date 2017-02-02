/* STARBOX */
jQuery(function () {
    jQuery('.starbox').each(function () {
        var starbox = jQuery(this);
        starbox.starbox({
            average: starbox.attr('data-start-value')
            , changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true
            , ghosting: starbox.hasClass('ghosting')
            , autoUpdateAverage: starbox.hasClass('autoupdate')
            , buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5
            , stars: starbox.attr('data-star-count') || 5
        }).bind('starbox-value-changed', function (event, value) {
            if (starbox.hasClass('random')) {
                var val = Math.random();
                starbox.next().text(' ' + val);
                return val;
            }
        })
    });
});
/* Efect image */
$('.tile').on('mouseover', function () {
        $(this).children('.photo').css({
            'transform': 'scale(' + $(this).attr('data-scale') + ')'
        });
    }).on('mouseout', function () {
        $(this).children('.photo').css({
            'transform': 'scale(1)'
        });
    }).on('mousemove', function (e) {
        $(this).children('.photo').css({
            'transform-origin': ((e.pageX - $(this).offset().left) / $(this).width()) * 100 + '% ' + ((e.pageY - $(this).offset().top) / $(this).height()) * 100 + '%'
        });
    }).each(function () {
        $(this)
            // add a photo container
            .append('<div class="photo"></div>')
            // set up a background image for each tile based on data-image attribute
            .children('.photo').css({
                'background-image': 'url(' + $(this).attr('data-image') + ')'
            });
    })
    /* CHECKOUT ELIMINANDO CON JS */
$(document).ready(function () {
    $('.close1').on('click', function () {
        $('.cart-header').fadeOut('slow', function () {
            $('.cart-header').remove();
        });
    });
    $('.close2').on('click', function () {
        $('.cart-header1').fadeOut('slow', function () {
            $('.cart-header1').remove();
        });
    });
    $('.close3').on('click', function () {
        $('.cart-header2').fadeOut('slow', function () {
            $('.cart-header2').remove();
        });
    });
});
/* CONTADOR DE PRODUCTOS */
$('.value-plus').on('click', function () {
    var divUpd = $(this).parent().find('.value')
        , newVal = parseInt(divUpd.text(), 10) + 1;
    divUpd.text(newVal);
});
$('.value-minus').on('click', function () {
    var divUpd = $(this).parent().find('.value')
        , newVal = parseInt(divUpd.text(), 10) - 1;
    if (newVal >= 1) divUpd.text(newVal);
});
/* ---------------------------------------------- /*
    * Smooth scroll / Scroll To Top
/* ---------------------------------------------- */
$('a[href*=#]').bind("click", function (e) {
    var anchor = $(this);
    $('html, body').stop().animate({
        scrollTop: $(anchor.attr('href')).offset().top
    }, 1000);
    e.preventDefault();
});
$(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
        $('.scroll-up').fadeIn();
    }
    else {
        $('.scroll-up').fadeOut();
    }
});