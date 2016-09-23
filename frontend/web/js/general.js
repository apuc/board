$(document).ready(function(){
    $(document).on('click', '.ruleRegister', function(){
        if($(this).prop('checked')){
            $('.reg-form-send').prop('disabled', false);
        }else{
            $('.reg-form-send').prop('disabled', true);
        }
    });

    $(document).on('click', '#dannie-1', function(){
        if($(this).prop('checked')){
            $('.place-ad__publish').prop('disabled', false);
        }else{
            $('.place-ad__publish').prop('disabled', true);
        }
    });


    $(document).on('click', '.generalModalCategory', function(){
        $.ajax({
            type: 'POST',
            url: "/adsmanager/adsmanager/general_modal",
            data: '',
            success: function (data) {
                $('.modal-body,.modal-flex').html(data);
                $('#modalType').modal('show');
            }
        });
    });

    $(document).on('click', '.modal-body__container', function(){
        var catId = $(this).data('category');
        $('#ads-category_id').val(catId);

        $.ajax({
            type: 'POST',
            url: "/adsmanager/adsmanager/show_category",
            data: 'id=' + catId,
            success: function (data) {
                /*$('.modal-body,.modal-flex').html(data);*/
                if(data){
                    $('.modal-body,.modal-flex').html(data);
                }else{
                    $.ajax({
                        type: 'POST',
                        url: "/adsmanager/adsmanager/show_category_end",
                        data: 'id=' + catId,
                        success: function (data) {
                            $('.SelectCategory').html(data);
                        }
                    });
                    $('#modalType').modal('hide');
                }

            }
        });
        return false;
    });

    $(document).on('click', '.heading-change', function(){
        $('div[data-parent="2"]').html('');
        var category = $(this).data('category');
        $('#ads-category_id').val(category);
        var column = $(this).parent().parent().data('parent');
        //console.log(column);
        $.ajax({
            type: 'POST',
            url: "/adsmanager/adsmanager/show_parent_category",
            data: 'id=' + category,
            success: function (data) {
                if(data){
                    if(column == 0){
                        $('div[data-parent="1"]').html(data);
                    }
                    if(column == 1){
                        $('div[data-parent="2"]').html(data);
                    }
                }
                else{
                    $.ajax({
                        type: 'POST',
                        url: "/adsmanager/adsmanager/show_category_end",
                        data: 'id=' + category,
                        success: function (data) {
                            //console.log(data);
                            $('.SelectCategory').html(data);
                        }
                    });
                    $('#modalType').modal('hide');

                    $.ajax({
                        type: 'POST',
                        url: "/adsmanager/adsmanager/show_additional_fields",
                        data: 'id=' + category,
                        success: function (data) {
                            //console.log(data);
                            $('#additional_fields').html(data);
                        }
                    });
                }


            }
        });
        return false;

    });

    $(document).on('focusin', '.jsHint', function(){
        var parent = $(this).parent();
        var hint = parent.children('.memo').fadeIn();
    });

    $(document).on('focusout', '.jsHint', function(){
        var parent = $(this).parent();
        var hint = parent.children('.memo').fadeOut();
    });

    $('#saveInfo').on('click', function(e){
        $('#input-5').fileinput('upload');
        //return false;
    });
    $("#profile-avatar").change(function(){
        readURL(this);
    });


    //////ФИЛЬТР ПОИСКА ОБЪЯВЛЕНИЙ
   /* $('ul.cities_list li').click(function(){
        $('.parentParentCategoryFieldsFilter').html('');
        $('.aditionlFieldsFilter').html('');
        var idCat = $(this).data('id');
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
    });*/

///Добавление/удаление в избранное
    $(document).on('click', '.average-ad-star', function(){
        var gist = $(this).data('gist'),
            gistId = $(this).data('gistid'),
            url = '';
        if($(this).hasClass("active-star-icon")){
            $(this).removeClass('active-star-icon');
            $(this).addClass('star-icon');
            url = '/favorites/default/del_favorites'
        }else {
            $(this).removeClass('star-icon');
            $(this).addClass('active-star-icon');
            url = '/favorites/default/add_favorites'
        }

        $.ajax({
            type: 'POST',
            url: url,
            data: 'gist=' + gist + '&gistId=' + gistId,
            success: function (data) {
                console.log(data);
            }
        });

    });



});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}