$(document).ready(function(){
    //Скрываем сообщение
    $(".alert-success").fadeOut(7000);


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


    //ЛИЧНЫЙ КАБИНЕТ
    //Снять с публикации
    $(document).on('click', '.remove-publication', function(){
        var id = $(this).data('id'),
            csrf = $(this).data('csrf'),
            page = $(this).data('page');
        var elem = $(this).closest('.item');

        $.confirm({
            'title'		: 'Вы действительно хотите снять с публикации объявления?',
            'message'	: 'Вы собираетесь снять с публикации это объявление! Пользователи не найдут Ваше объявление! <br />Вы уверены?',
            'buttons'	: {
                'Да'	: {
                    'class'	: 'blue',
                    'action': function(){
                        elem.remove();
                        $.ajax({
                            type: 'POST',
                            url: "/personal_area/ads/remove_publication",
                            data: 'id=' + id + '&_csrf=' + csrf + '&page=' + page,
                            success: function (data) {
                                console.log(data);
                            }
                        });
                    }
                },

                'Нет'	: {
                    'class'	: 'gray',
                    'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
                }
            }
        });
        return false;
    });

    //Опубликовать
    $(document).on('click', '.publication', function(){
        var id = $(this).data('id'),
            csrf = $(this).data('csrf'),
            page = $(this).data('page');
        var elem = $(this).closest('.item').remove();

        $.ajax({
            type: 'POST',
            url: "/personal_area/ads/publication",
            data: 'id=' + id + '&_csrf=' + csrf + '&page=' + page,
            success: function (data) {
                console.log(data);
            }
        });
    });

    //Удалить одно объявление
    $(document).on('click', '.remove-ads', function(){
        var id = $(this).data('id'),
            csrf = $(this).data('csrf'),
            ads = $(this).data('ads'),
            page = $(this).data('page');
        var elem = $(this).closest('.item');

        $.confirm({
            'title'		: 'Вы действительно хотите удалить объявление?',
            'message'	: 'Вы собираетесь удалить это объявление! Если Вы удалите это объявление то востановить его уже не будет возможным! <br />Вы уверены?',
            'buttons'	: {
                'Да'	: {
                    'class'	: 'blue',
                    'action': function(){
                        elem.remove();
                        $.ajax({
                            type: 'POST',
                            url: "/personal_area/ads/delete",
                            data: 'id=' + id + '&_csrf=' + csrf + '&ads=' + ads + '&page=' + page,
                            success: function (data) {
                                console.log(data);
                            }
                        });
                    }
                },

                'Нет'	: {
                    'class'	: 'gray',
                    'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
                }
            }
        });
        return false;
    });

    //Удалить все или несколько из избранного в личном кабинете
    $(document).on('click', '.delete-favorites-all', function(){
        var id = propChecked();
        var csrf = $(this).data('csrf'),
            ads = $(this).data('ads'),
            page = $(this).data('page');
        if(id == ''){
            $.confirm({
                'title'		: 'Вы ни чего не выбрали!',
                'message'	: 'Выберите объявления которые хотите удалить из избранного',
                'buttons'	: {
                    'Ок'	: {
                        'class'	: 'blue',
                        'action': function(){}
                    }
                }
            });
        }
        else{
            $.ajax({
                type: 'POST',
                url: "/personal_area/favorites/delete_all_favorites",
                data: 'id=' + id + '&_csrf=' + csrf + '&ads=' + ads + '&page=' + page,
                success: function (data) {
                    console.log(data);
                }
            });
        }
        return false;
    });

    //Устанавливаем все чекбоксы в личном кабинете
    $(document).on('click', '#check0', function () {
        //$(this).prop("checked", true);
        if($(this).prop('checked')) {
            $('.ads-check').prop("checked", true);
        }
        else{
            $('.ads-check').prop("checked", false);
        }
    });

    //Клик по любому чекбоксу(снимаем у самого верхнего, который отмечает все)
    $(document).on('click', '.ads-check', function () {
        if($("#check0").prop('checked')) {
            $('#check0').prop("checked", false);
        }
    })


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

//Собираем все нажатые чекбоксы
function propChecked(){
    var id = '';
    $('.ads-check').each(function(){
        if($(this).prop('checked')) {
            id += $(this).val() + ',';
        }
    });
    console.log(id);
    return id;
}