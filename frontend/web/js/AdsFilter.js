$(document).ready(function(){
    //////ФИЛЬТР ПОИСКА ОБЪЯВЛЕНИЙ
    $('ul.cities_list li').click(function(){
        $('.parentParentCategoryFieldsFilter').html('');
        $('.aditionlFieldsFilter').html('');
        var idCat = $(this).data('id');
        $('.filter-selected-cat').attr('data-id', idCat);



        filterSearchCount();
        $('.aditionlFieldsFilter').html('');
        $.ajax({
            type: 'POST',
            url: "/adsmanager/filter/show_parent_category",
            data: 'id=' + idCat,
            success: function (data) {
                //console.log(data);
                $('.parentCategoryFieldsFilter').html(data);
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
        filterSearchCount();
    });
    $(document).on('change', '.filterAdsFields', function(){
        //console.log($(this).val());
        filterSearchCount();
    });



    //ползунок цена

    //open-price-range//


//close-price-range//



});


function filterSearchCount(){


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
    //console.log(idAdsFields);
    $.ajax({
        type: 'POST',
        url: "/adsmanager/filter/filter_search_count",
        data: 'idAdsFields=' + idAdsFields + '&idCat=' + idCategory,
        success: function (data) {
            console.log(data);
            $('#jsfilter_ajax_output').html(data);

            $("#jsfilter_ajax_cont").show("slow");

            //$("#jsfilter_ajax_cont").animate({left:'+=200'},2000);

            $("#jsfilter_ajax_cont").queue(function () {

                $(this).dequeue();

            });

        }
    });

    //console.log(id);
}



$(function() {
    $( "#slider_price" ).slider({
        range: true,
        min: 100,
        max: 500,
        values: [ 100, 500 ],
        slide: function( event, ui ) {
            //Поле минимального значения
            $( "#price" ).val(ui.values[ 0 ]);
            //Поле максимального значения
            $("#price2").val(ui.values[1]);}
    });
    //Записываем значения ползунков в момент загрузки страницы
    //То есть значения по умолчанию
    $( "#price" ).val($( "#slider_price" ).slider( "values", 0 ));
    $("#price2").val($("#slider_price").slider( "values", 1 ));
});
$('#price').change(function() {
    var val = $(this).val();
    $('#slider_price').slider("values",0,val);
});
$('#price2').change(function() {
    var val1 = $(this).val();
    $('#slider_price').slider("values",1,val1);
});