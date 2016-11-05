$(document).ready(function () {

    //////ФИЛЬТР ПОИСКА ОБЪЯВЛЕНИЙ
//alert(123);
    $('.region').click(function (event) {
        if ($(".city-list").is(':visible')) {
            $(".city-list").hide("slow");
        }

        $('.region-list').slideToggle();
        return false;
    });
    $('.russia').click(function (event) {
        $('.russia-list').slideToggle();
        return false;
    });

    $('.city').click(function (event) {

        //$(".region-list").hide("slow");

        if($('.city-list').is(':visible')){

            $(".city-list").hide("slow");
        }else{

            $('.city-list').slideToggle();
        }



    });


    /*$('.republic').on('click', function (event) {
        $('.city').css({display: "inline-block"});
        $('.city-list').slideToggle();
        $('.region-list').css({display: "none"});
        return false;

    });*/
    jQuery(function($){
        $(document).mouseup(function (e){ // событие клика по веб-документу
            var city = $(".city"); // тут указываем ID элемента
            var region = $(".region"); // тут указываем ID элемента
            if (!city.is(e.target) // если клик был не по нашему блоку
                && city.has(e.target).length === 0) { // и не по его дочерним элементам
                $('.city-list').hide("slow"); // скрываем его
            }
            if (!region.is(e.target) // если клик был не по нашему блоку
                && region.has(e.target).length === 0) { // и не по его дочерним элементам
                $('.region-list').hide("slow"); // скрываем его
            }
        });
    });

    /*$("body").click(function (e) {
        if ($(".region-list, .russia-list, .city-list").is(':visible')) {
            $(".region-list, .russia-list, .city-list").hide("slow");
        }
        console.log('body');
    });*/


    /*$(document).on('click', '.selectRegion', function(){*/
    $(".selectRegion").click(function () {

        $("input[name='cityFilter']").val('');
        $('.textSelectCity').text('Выберите город');
        var regionId = $(this).attr('reg-id');
        var regionName = $(this).text();

        $('.textSelectRegion').text(regionName);
        $("input[name='regionFilter']").val(regionId);
        $.ajax({
            type: 'POST',
            url: "/site/show_city_list",
            data: 'id=' + regionId,
            success: function (data) {
                $('.city-list').html(data);
                $('.city').css({display: "inline-block"});
                $('.city-list').slideToggle();
                $('.region-list').css({display: "none"});
            }
        });




        return false;
    });

    $(document).on('click', '.selectCity', function () {
        var idCity = $(this).attr('city-id');
        var nameCity = $(this).text();
        $("input[name='cityFilter']").val(idCity);
        $('.textSelectCity').text(nameCity);
        console.log('city');

        $('.city').css({display: "inline-block"});
        //$('.city-list').slideToggle();
        $('.region-list').css({display: "none"});
        return false;
    });


    $('ul.cities_list li').click(function () {
        $('.parentParentCategoryFieldsFilter').html('');
        $('.aditionlFieldsFilter').html('');
        var idCat = $(this).data('id');
        $('.filter-selected-cat').attr('data-id', idCat);
        $("input[name='mainCat']").val(idCat);


        $('.aditionlFieldsFilter').html('');
        $.ajax({
            type: 'POST',
            url: "/site/show_parent_category",
            data: 'id=' + idCat,
            success: function (data) {
                //console.log(data);
                $('.parentCategoryFieldsFilter').html(data);
                filterSearchCount();
            }
        });

    });


    $('ul.cities_list1 li').click(function () {
        var idCat = $(this).data('id');
        $('.filter-selected-cat').attr('data-id', idCat);
        $("input[name='mainCat']").val(idCat);
    });


    $(document).on('change', '#region-filter', function () {
        var idRegion = $(this).val();
        $.ajax({
            type: 'POST',
            url: "/site/show_city_filter",
            data: 'id=' + idRegion,
            success: function (data) {
                //console.log(data);
                //console.log(params);
                $('.cityFilterWr').html(data);
            }
        });
    });


    $(document).on('change', '#parent-category-filter', function () {
        $('.parentParentCategoryFieldsFilter').html('');
        $('.aditionlFieldsFilter').html('');
        var id = $(this).val();
        $.ajax({
            type: 'POST',
            url: "/site/show_fields_filter",
            data: 'id=' + id,
            success: function (data) {
                //console.log(data);
                var params = JSON.parse(data);
                //console.log(params);
                $(params.class).html(params.html);
            }
        });
    });

    $(document).on('change', '#parent-parent-category-filter', function () {
        var id = $(this).val();
        $.ajax({
            type: 'POST',
            url: "/site/show_fields_filter",
            data: 'id=' + id,
            success: function (data) {
                //console.log(data);
                var params = JSON.parse(data);
                //console.log(params);
                $(params.class).html(params.html);
            }
        });
    });


    $(document).on('change', '.filterCategory', function () {
        //console.log($(this).val());
        var obj = $(this).closest('div');
        filterSearchCount(obj);
    });

    /*$(document).on('change', '.filterRegCity', function(){
     //console.log($(this).val());
     var obj = $(this).closest('div');
     filterSearchCount(obj);
     });*/

    $(document).on('change', '.filterAdsFields', function () {
        //console.log($(this).val());
        var obj = $(this).closest('div');
        filterSearchCount(obj);
    });


    $(document).on('click', '.filterSearchView', function () {
        /*$.ajax({
         type: 'POST',
         url: "/adsmanager/filter/filter_search_view",
         data: search(),
         success: function (data) {
         $('.ad-content-main').html(data);
         }
         });*/
        document.getElementById('filterform').submit();
        return false;
    })


});


function filterSearchCount(obj) {
    $.ajax({
        type: 'POST',
        url: "/site/filter_search_count",
        data: search(),
        success: function (data) {

            if (obj == null) {
                $('.parentCategoryFieldsFilter').append('<div id="jsfilter_ajax_cont"> <div id="sel_block_arrow"></div>Найдено объявлений: <span id="jsfilter_ajax_output">' + data + '</span>\. <a class="filterSearchView" href="#">Показать</a> </div>');
                $("#jsfilter_ajax_cont").show("slow");
            }
            else {
                $(obj).append('<div id="jsfilter_ajax_cont"> <div id="sel_block_arrow"></div>Найдено объявлений: <span id="jsfilter_ajax_output">' + data + '</span>\. <a class="filterSearchView"  href="#">Показать</a> </div>');
                $("#jsfilter_ajax_cont").show("slow");
            }
        }
    });

    //console.log(id);

}

function search() {
    $("#jsfilter_ajax_cont").remove();

    var idAdsFields = '',
        idCategory = $('.filter-selected-cat').attr('data-id') + ',';

    //Собираем id категорий
    $('.filterCategory').each(function () {
        idCategory += $(this).val() + ',';
    });
    //Собираем id доп полей
    $('.filterAdsFields').each(function () {
        idAdsFields += $(this).val() + ',';
    });

    //Получаем область и город
    var region = $("input[name='regionFilter']").val(),
        city = $("input[name='cityFilter']").val();
    //Получаем уену ОТ
    var minPrice = parseInt($("input[name='minPrice']").val(), 10);
    //console.log(minPrice);
    //Получаем уену ДО
    var maxPrice = parseInt($("input[name='maxPrice']").val(), 10);

    return 'idAdsFields=' + idAdsFields + '&idCat=' + idCategory + '&minPrice=' + minPrice + '&maxPrice=' + maxPrice + '&regionFilter=' + region + '&cityFilter=' + city;
}


$(function () {

    var min = parseInt($("input[name='minPrice']").val(), 10);
    var max = parseInt($("input[name='maxPrice']").val(), 10);
    var selMin = parseInt($("input[name='minPrice']").attr('selprice'), 10);
    var selMax = parseInt($("input[name='maxPrice']").attr('selprice'), 10);


    $("#slider_price").slider({
        range: true,
        min: min,
        max: max,
        values: [selMin, selMax],
        slide: function (event, ui) {
            //Поле минимального значения
            $("#price").val(ui.values[0]);
            //Поле максимального значения
            $("#price2").val(ui.values[1]);
        },
        stop: function (event, ui) {
            $("input[name='minPrice']").val(ui.values[0]).change();
            $("input[name='maxPrice']").val(ui.values[1]).change();
            /* var obj = $(this).closest('div');
             filterSearchCount(obj);*/

        }

    });
    //Записываем значения ползунков в момент загрузки страницы
    //То есть значения по умолчанию
    $("#price").val($("#slider_price").slider("values", 0));
    $("#price2").val($("#slider_price").slider("values", 1));
});
$('#price').change(function () {
    var val = $(this).val();
    var obj = $(this).closest('div');
    $('#slider_price').slider("values", 0, val);
    filterSearchCount(obj);
});
$('#price2').change(function () {
    var val1 = $(this).val();
    var obj = $(this).closest('div');
    $('#slider_price').slider("values", 1, val1);

    filterSearchCount(obj);
});



