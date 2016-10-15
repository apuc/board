$(document).ready(function(){
    //////ФИЛЬТР ПОИСКА ОБЪЯВЛЕНИЙ
    $('ul.cities_list li').click(function(){
        $('.parentParentCategoryFieldsFilter').html('');
        $('.aditionlFieldsFilter').html('');
        var idCat = $(this).data('id');
        $('.filter-selected-cat').attr('data-id', idCat);
        $("input[name='mainCat']").val(idCat);



        $('.aditionlFieldsFilter').html('');
        $.ajax({
            type: 'POST',
            url: "/adsmanager/filter/show_parent_category",
            data: 'id=' + idCat,
            success: function (data) {
                //console.log(data);
                $('.parentCategoryFieldsFilter').html(data);
                filterSearchCount();
            }
        });

    });

    $(document).on('change', '#parent-category-filter', function(){
        $('.parentParentCategoryFieldsFilter').html('');
        $('.aditionlFieldsFilter').html('');
        var id = $(this).val();
        $.ajax({
            type: 'POST',
            url: "/adsmanager/filter/show_ads_fields_filter",
            data: 'id=' + id,
            success: function (data) {
                //console.log(data);
                var params = JSON.parse(data);
                //console.log(params);
                $(params.class).html(params.html);
            }
        });
    });

    $(document).on('change', '#parent-parent-category-filter', function(){
        var id = $(this).val();
        $.ajax({
            type: 'POST',
            url: "/adsmanager/filter/show_ads_fields_filter",
            data: 'id=' + id,
            success: function (data) {
                //console.log(data);
                var params = JSON.parse(data);
                //console.log(params);
                $(params.class).html(params.html);
            }
        });
    });


    $(document).on('change', '.filterCategory', function(){
        //console.log($(this).val());
        var obj = $(this).closest('div');
        filterSearchCount(obj);
    });
    $(document).on('change', '.filterAdsFields', function(){
        //console.log($(this).val());
        var obj = $(this).closest('div');
        filterSearchCount(obj);
    });


    $(document).on('click', '.filterSearchView', function(){
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


function filterSearchCount(obj){
    $.ajax({
        type: 'POST',
        url: "/adsmanager/filter/filter_search_count",
        data: search(),
        success: function (data) {

            if(obj == null){
                $('.parentCategoryFieldsFilter').append('<div id="jsfilter_ajax_cont"> <div id="sel_block_arrow"></div>Найдено объявлений: <span id="jsfilter_ajax_output">' + data + '</span>\. <a class="filterSearchView" href="#">Показать</a> </div>');
                $("#jsfilter_ajax_cont").show("slow");
            }
            else{
                $(obj).append('<div id="jsfilter_ajax_cont"> <div id="sel_block_arrow"></div>Найдено объявлений: <span id="jsfilter_ajax_output">' + data + '</span>\. <a class="filterSearchView"  href="#">Показать</a> </div>');
                $("#jsfilter_ajax_cont").show("slow");
            }
        }
    });

    //console.log(id);

}

function search(){
    $("#jsfilter_ajax_cont").remove();

    var idAdsFields = '',
        idCategory = $('.filter-selected-cat').attr('data-id') + ',';

    //Собираем id категорий
    $('.filterCategory').each(function(){
        idCategory += $(this).val() + ',';
    });
    //Собираем id доп полей
    $('.filterAdsFields').each(function(){
        idAdsFields += $(this).val() + ',';
    });

    //Получаем уену ОТ
    var minPrice = parseInt($("input[name='minPrice']").val(), 10);
    //console.log(minPrice);
    //Получаем уену ДО
    var maxPrice = parseInt($("input[name='maxPrice']").val(), 10);

    return 'idAdsFields=' + idAdsFields + '&idCat=' + idCategory + '&minPrice=' + minPrice + '&maxPrice=' + maxPrice;
}


$(function() {

    var min = parseInt($("input[name='minPrice']").val(), 10);
    var max = parseInt($("input[name='maxPrice']").val(), 10);
    var selMin = parseInt($("input[name='minPrice']").attr('selprice'), 10);
    var selMax = parseInt($("input[name='maxPrice']").attr('selprice'), 10);


    $( "#slider_price" ).slider({
        range: true,
        min: min,
        max: max,
        values: [ selMin, selMax ],
        slide: function( event, ui ) {
            //Поле минимального значения
            $( "#price" ).val(ui.values[ 0 ]);
            //Поле максимального значения
            $("#price2").val(ui.values[1]);
        },
        stop: function( event, ui ) {
            $("input[name='minPrice']").val(ui.values[ 0 ]).change();
            $("input[name='maxPrice']").val(ui.values[ 1 ]).change();
           /* var obj = $(this).closest('div');
            filterSearchCount(obj);*/

        }

    });
    //Записываем значения ползунков в момент загрузки страницы
    //То есть значения по умолчанию
    $( "#price" ).val($( "#slider_price" ).slider( "values", 0 ));
    $("#price2").val($("#slider_price").slider( "values", 1 ));
});
$('#price').change(function() {
    var val = $(this).val();
    var obj = $(this).closest('div');
    $('#slider_price').slider("values",0,val);
    filterSearchCount(obj);
});
$('#price2').change(function() {
    var val1 = $(this).val();
    var obj = $(this).closest('div');
    $('#slider_price').slider("values",1,val1);

    filterSearchCount(obj);
});


