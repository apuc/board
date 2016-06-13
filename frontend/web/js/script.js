$(document).ready(function() {
    /*owl-carousel*/
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        //autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    $('.best__carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 4
                }
            }
    });
    $('.new-shops__carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
    });
    $('.coupon__carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 3
                }
            }
    });
   /*close owl-carousel*/
    /*-----функция появления стрелки вверх при прокрутке окна вниз-----*/
    $(window).scroll(function(){

        $(this).hide().removeAttr("href");
        if ($(window).scrollTop() >= "250") $(this).fadeIn("slow")/*показывать при прокрутке вниз показывать медленно #Go_Top*/
        var scrollDiv = $('#Go_Top');

        if ($(window).scrollTop() <= "250") $(scrollDiv).fadeOut("slow")/*при прокрутке ввверх медленно скрывать #Go_Top*/
        else $(scrollDiv).fadeIn("slow")
    });

    $('#Go_Top').click(function () {/*функция плавной прокрутки вверх при клике на стрелку "вверх"*/
        $("html, body").animate({scrollTop: 0}, "slow");
        return false;
    });
    /*----- close-----*/
    /*--flexslider carousel*/
    $(window).load(function() {
        // The slider being synced must be initialized first
        $('#carousel').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: true,
            slideshow: false,
            itemWidth: 192,
            itemMargin: 5,
            minItems: 3,
            maxItems: 4,
            asNavFor: '#slider'
        });

        $('#slider').flexslider({
            animation: "fade",
            controlNav: false,
            animationLoop: true,
            slideshow: false,
            sync: "#carousel"
        });
    });
    /*--close-- */
    /*--функция появления блока с телефонами--*/
    $('.ad__descr--number').click(function() {//при клике на элемент
        $('.ad__descr--show').slideToggle('slow');
        return false;
    });
    /*--close--*/
});
