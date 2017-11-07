
/* выбор города */
$(document).ready(function () {
    $('.delivery_list').click(function () {
        $(".cities_list").slideToggle('fast');
    });
    $('ul.cities_list li').click(function () {
        var tx = $(this).html();
        var tv = $(this).attr('alt');
        $(".cities_list").slideUp('fast');
        $(".delivery_list span").html(tx);
        $(".delivery_text").html(tv);
    });
});
$(document).ready(function () {
    $('.delivery_list1').click(function () {
        $(".cities_list1").slideToggle('fast');
    });
    $('ul.cities_list1 li').click(function () {
        var tx = $(this).html();
        var tv = $(this).attr('alt');
        $(".cities_list1").slideUp('fast');
        $(".delivery_list1 .select-category").html(tx);
        $(".delivery_text1").html(tv);
    });
});

$(function () {
    $(".heading-change").click(function (e) {
        e.preventDefault();
        $(".heading-change").removeClass('active');
        $(this).addClass('active');
    })
});



    // карта
    var map;
    ymaps.ready(function () {
        if ($('#map').length > 0) {
            map = new ymaps.Map("map", {
                center: [55.76, 37.64],
                zoom: 7
            });
        }
    });








// });
