$(document).ready(function () {

    /*$("#ads-phone").mask(["+9 (999) 999-9999", "+99(999) 999-99-99"]);*/

    var countInput = new Characters();
    countInput.setInput('#ads-title','#title-count-res');
    countInput.setInput('#ads-content','#descr-count-res');


    //Скрываем сообщение
    $(".alert-success").fadeOut(10000);


    //Вывод списка организация для выбора при добавлении объявления

    $(document).on('change', '#ads-private_business', function () {
        var val = $(this).val();
        if(val == 0){
            $('.selectBusiness').html('');
        }else{
            $.ajax({
                type: 'POST',
                url: "/site/get_organization",
                data: '',
                success: function (data) {
                    $('.selectBusiness').html(data);
                }
            });
        }
    });


    //Категории на главной

    /*$('.home-content-item').click(function(event) {

        //
        var id = $(this).attr("data-id");
        if( $("#button"+id).is(':visible') ){
            $("#button"+id).slideToggle();

        }
        else{
            $(".text-about").hide("slow");
            $("#button"+id).slideToggle();
        }

        return false;

    });*/
    $("body").click(function(e) {
        if($(e.target).closest(".text-about").length==0) $(".text-about").hide("slow");
    });


    $(document).on('click', '.ruleRegister', function () {
        if ($(this).prop('checked')) {
            $('.reg-form-send').prop('disabled', false);
        } else {
            $('.reg-form-send').prop('disabled', true);
        }
    });

    $(document).on('click', '#dannie-1', function () {
        if ($(this).prop('checked')) {
            $('.place-ad__publish').prop('disabled', false);
        } else {
            $('.place-ad__publish').prop('disabled', true);
        }
    });


    $(document).on('click', '.select-category-add', function () {

        $.ajax({
            type: 'POST',
            url: "/site/general_modal",
            data: '',
            success: function (data) {
                $('.modal-body,.modal-flex').html(data);
                $('#modalType').modal('show');
            }
        });
    });

    //Скрыть модалку при выборе категорий
    $(document).on('click', '.close', function () {
        $('#modalType').modal('hide')
    });


    $(document).on('click', '.modal-body__container', function () {
        var catId = $(this).data('category');
        $('#ads-category_id').val(catId);

        $.ajax({
            type: 'POST',
            url: "/site/show_category",
            data: 'id=' + catId,
            success: function (data) {
                /*$('.modal-body,.modal-flex').html(data);*/
                if (data) {
                    $('.modal-body,.modal-flex').html(data);
                } else {
                    $.ajax({
                        type: 'POST',
                        url: "/site/show_category_end",
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

    $(document).on('click', '.heading-change', function () {
        $('div[data-parent="2"]').html('');
        var category = $(this).data('category');


        var column = $(this).parent().parent().data('parent');
        if(column == 0){
            $('.heading-change').removeClass('active');
        }
        if(column == 1){
            $('div[data-parent="1"] .heading-change').removeClass('active');
        }


        $(this).addClass('active');

        $('#ads-category_id').val(category);
        //console.log(column);

        $.ajax({
            type: 'POST',
            url: "/site/show_parent_modal_category",
            data: 'id=' + category,
            success: function (data) {
                if (data) {
                    if (column == 0) {
                        $('div[data-parent="1"]').html(data);
                    }
                    if (column == 1) {
                        $('div[data-parent="2"]').html(data);
                    }
                }
                else {
                    $.ajax({
                        type: 'POST',
                        url: "/site/show_category_end",
                        data: 'id=' + category,
                        success: function (data) {
                            //console.log(data);
                            $('.SelectCategory').html(data);
                        }
                    });
                    $('#modalType').modal('hide');

                    $.ajax({
                        type: 'POST',
                        url: "/site/show_additional_fields",
                        data: 'id=' + category,
                        success: function (data) {
                            console.log(data);
                            $('#additional_fields').html(data);
                        }
                    });
                }


            }
        });
        return false;

    });

    $(document).on('focusin', '.jsHint', function () {
        var parent = $(this).parent();
        var hint = parent.children('.memo').fadeIn();
    });

    $(document).on('focusout', '.jsHint', function () {
        var parent = $(this).parent();
        var hint = parent.children('.memo').fadeOut();
    });

    $('#saveInfo').on('click', function (e) {
        $('#input-5').fileinput('upload');
        //return false;
    });
    $("#profile-avatar").change(function () {
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
    $(document).on('click', '.average-ad-star', function () {
        var gist = $(this).data('gist'),
            gistId = $(this).data('gistid'),
            text = $(this).html(),
            csrf = $(this).data('csrf'),
            url = '';
        //console.log(text);
        if ($(this).hasClass("active-star-icon")) {
            $(this).removeClass('active-star-icon');
            $(this).addClass('star-icon');
            if (text != '') {
                $(this).html('В избранное');
            }
            url = '/favorites/default/del_favorites'
        } else {
            $(this).removeClass('star-icon');
            $(this).addClass('active-star-icon');
            if (text != '') {
                $(this).html('Из избранного');
            }
            url = '/favorites/default/add_favorites'
        }

        $.ajax({
            type: 'POST',
            url: url,
            data: 'gist=' + gist + '&gistId=' + gistId + '&_csrf=' + csrf,
            success: function (data) {
            }
        });

    });


    //ЛИЧНЫЙ КАБИНЕТ
    //Снять с публикации
    $(document).on('click', '.remove-publication', function () {
        var id = $(this).data('id'),
            csrf = $(this).data('csrf'),
            page = $(this).data('page');
        var elem = $(this).closest('.item');

        $.confirm({
            'title': 'Вы действительно хотите снять с публикации объявления?',
            'message': 'Вы собираетесь снять с публикации это объявление! Пользователи не найдут Ваше объявление! <br />Вы уверены?',
            'buttons': {
                'Да': {
                    'class': 'blue',
                    'action': function () {
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

                'Нет': {
                    'class': 'gray',
                    'action': function () {
                    }	// Nothing to do in this case. You can as well omit the action property.
                }
            }
        });
        return false;
    });

    //Опубликовать
    $(document).on('click', '.publication', function () {
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
    $(document).on('click', '.remove-ads', function () {
        var id = $(this).data('id'),
            csrf = $(this).data('csrf'),
            ads = $(this).data('ads'),
            page = $(this).data('page');
        var elem = $(this).closest('.item');

        $.confirm({
            'title': 'Вы действительно хотите удалить объявление?',
            'message': 'Вы собираетесь удалить это объявление! Если Вы удалите это объявление то востановить его уже не будет возможным! <br />Вы уверены?',
            'buttons': {
                'Да': {
                    'class': 'blue',
                    'action': function () {
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

                'Нет': {
                    'class': 'gray',
                    'action': function () {
                    }	// Nothing to do in this case. You can as well omit the action property.
                }
            }
        });
        return false;
    });

    //Удалить все или несколько из избранного в личном кабинете
    $(document).on('click', '.delete-favorites-all', function () {
        var id = propChecked();
        var csrf = $(this).data('csrf'),
            ads = $(this).data('ads'),
            page = $(this).data('page');
        if (id == '') {
            $.confirm({
                'title': 'Вы ни чего не выбрали!',
                'message': 'Выберите объявления которые хотите удалить из избранного',
                'buttons': {
                    'Ок': {
                        'class': 'blue',
                        'action': function () {
                        }
                    }
                }
            });
        }
        else {
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

    //Удалить все или несколько из объявлений в личном кабинете
    $(document).on('click', '.delete-all', function () {
        var id = propChecked();
        var csrf = $(this).data('csrf'),
            ads = $(this).data('ads'),
            page = $(this).data('page');
        if (id == '') {
            $.confirm({
                'title': 'Вы ни чего не выбрали!',
                'message': 'Выберите объявления которые хотите удалить',
                'buttons': {
                    'Ок': {
                        'class': 'blue',
                        'action': function () {
                        }
                    }
                }
            });
        }
        else {
            $.confirm({
                'title': 'Вы уверены что хотите удалить выбранные объявления?',
                'message': 'Вы собираетесь удалить эти объявления! Если Вы удалите их, то востановить их уже не будет возможным! <br />Вы уверены?',
                'buttons': {
                    'Да': {
                        'class': 'blue',
                        'action': function () {
                            $.ajax({
                                type: 'POST',
                                url: "/personal_area/ads/delete_all",
                                data: 'id=' + id + '&_csrf=' + csrf + '&ads=' + ads + '&page=' + page,
                                success: function (data) {
                                    console.log(data);
                                }
                            });
                        }
                    },
                    'Нет': {
                        'class': 'gray',
                        'action': function () {
                        }
                    }
                }
            });
        }
        return false;
    });

    //Снимаем с публикации все или несколько из объявлений в личном кабинете
    $(document).on('click', '.remove-publication-all', function () {
        var id = propChecked();
        var csrf = $(this).data('csrf'),
            page = $(this).data('page');
        if (id == '') {
            $.confirm({
                'title': 'Вы ни чего не выбрали!',
                'message': 'Выберите объявления которые хотите снять с публикации',
                'buttons': {
                    'Ок': {
                        'class': 'blue',
                        'action': function () {
                        }
                    }
                }
            });
        }
        else {
            $.confirm({
                'title': 'Вы уверены что хотите снять с публикации выбранные объявления?',
                'message': 'Вы собираетесь снять с публикации эти объявления! Если Вы это сделаете, то другие пользователи не смогут их найти! <br />Вы уверены?',
                'buttons': {
                    'Да': {
                        'class': 'blue',
                        'action': function () {
                            $.ajax({
                                type: 'POST',
                                url: "/personal_area/ads/remove_publication_all",
                                data: 'id=' + id + '&_csrf=' + csrf + '&page=' + page,
                                success: function (data) {
                                    console.log(data);
                                }
                            });
                        }
                    },
                    'Нет': {
                        'class': 'gray',
                        'action': function () {
                        }
                    }
                }
            });
        }
        return false;
    });

    //Публикуем все или несколько из объявлений в личном кабинете
    $(document).on('click', '.publication-all', function () {
        var id = propChecked();
        var csrf = $(this).data('csrf'),
            page = $(this).data('page');
        if (id == '') {
            $.confirm({
                'title': 'Вы ни чего не выбрали!',
                'message': 'Выберите объявления которые хотите опубликовать',
                'buttons': {
                    'Ок': {
                        'class': 'blue',
                        'action': function () {
                        }
                    }
                }
            });
        }
        else {
            $.ajax({
                type: 'POST',
                url: "/personal_area/ads/publication_all",
                data: 'id=' + id + '&_csrf=' + csrf + '&page=' + page,
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
        if ($(this).prop('checked')) {
            $('.ads-check, .org-check').prop("checked", true);
        }
        else {
            $('.ads-check, .org-check').prop("checked", false);
        }
    });

    //Клик по любому чекбоксу(снимаем у самого верхнего, который отмечает все)
    $(document).on('click', '.ads-check, .org-check', function () {
        if ($("#check0").prop('checked')) {
            $('#check0').prop("checked", false);
        }
    });

    //Показать форму для отправки сообщений в объявлении
    $('.write-seller').on('click', function () {
        $('.msg_box').slideToggle();
        return false;
    });

    //Отправка сообщения автору объявления
    $('#send_msg_to_author').on('click', function () {
        var msg = $('#msg_to_author').val();
        var from = $("input[name='from']").val();
        var to = $("input[name='to']").val();
        $.ajax({
            type: 'POST',
            url: "/site/send_msg",
            data: {
                msg:msg,
                to:to,
                from:from
            },
            success: function (data) {
                $('.msg_box').html(data)
            }
        });
    });

    if(document.getElementById('cssmenu')){
        $('.open').each(function(){
            $(this).find('ul').slideDown();
        });
    }
//ПОКАЗАТЬ НОМЕР ТЕЛЕФОНА
    $(document).on('click', '.showPhone', function () {
        var id = $(this).data('id');
        var csrf = $(this).data('csrf');
        $.ajax({
            type: 'POST',
            url: "/site/show_phone",
            data: 'id=' + id + '&_csrf=' + csrf,
            success: function (data) {
               /* console.log(data);*/
                $('.phoneUser').html(data);
              // $('.tel-icon').insertAfter(data);

            }
        });
        return false;
    });

//КОЛ-ВО ДНЕЙ


    if(document.getElementsByClassName('bar-two').length > 0){
        $(".bar-two .bar").each(function () {
            $(this).progress();
        })
    }

    if(document.getElementsByClassName('bar-one').length > 0){
        $(".bar-one .bar").each(function () {
            $(this).progress();
        })
    }

    if(document.getElementsByClassName('bar-three').length > 0){
        $(".bar-three .bar").each(function () {
            $(this).progress();
        })
    }


    //Отправить письмо администратору о заблокированном объявлении
    $(document).on('click', '#send_msg_to_admin', function () {
        var csrf = $("input[name='_csrf']").val();
        var text = $("textarea[name='msg_to_author']").val();
        var id = $("input[name='ads_id']").val();
        var user_id = $("input[name='from']").val();
        $.ajax({
            type: 'POST',
            url: "/site/msg_product_to_admin",
            data: 'id=' + id + '&_csrf=' + csrf + '&user_id=' + user_id + '&text=' + text,
            success: function (data) {
                /* console.log(data);*/
                $('.msg_box').html(data);
                // $('.tel-icon').insertAfter(data);

            }
        });
    });


    if ($('.all-shops__content_left').length > 0) {
        $(window).scroll(function () {
            var sb_m_n = 50;
            /* отступ сверху и снизу */
            var mb_n = 300;
            /* высота подвала с запасом */
            var st_n = $(window).scrollTop();
            var sb_n = $(".all-shops__content_left");
            var sbi_n = $("#cssmenu-1");
            var sb_ot_n = sb_n.offset().top;
            var sbi_ot_n = sbi_n.offset().top;
            var sb_h_n = sb_n.height();
            if (sb_h_n + $(document).scrollTop() + sb_m_n + mb_n < $(document).height()) {
                if (st_n > sb_ot_n) {
                    var h = Math.round(st_n - sb_ot_n) + sb_m_n;
                    sb_n.css({"paddingTop": h});
                }
                else {
                    sb_n.css({"paddingTop": 0});
                }
            }

        });
    }


    /*modal reclama page*/
    var overlay = $('#overlay');
    var close = $('.modal_close, #overlay');

    $('.open_modals').click(function (event) { // лoвим клик пo ссылки с id="go"
        event.preventDefault(); // выключaем стaндaртную рoль элементa
        var div = $(this).attr('href');
        overlay.fadeIn(400, // снaчaлa плaвнo пoкaзывaем темную пoдлoжку
            function () { // пoсле выпoлнения предъидущей aнимaции
                $(div)
                    .css('display', 'block') // убирaем у мoдaльнoгo oкнa display: none;
                    .animate({opacity: 1, top: '50%'}, 200); // плaвнo прибaвляем прoзрaчнoсть oднoвременнo сo съезжaнием вниз
            });
    });

    $(".open_modal2").click(function (event) { // лoвим клик пo ссылки с id="go"
        event.preventDefault(); // выключaем стaндaртную рoль элементa

        overlay.fadeIn(400, // снaчaлa плaвнo пoкaзывaем темную пoдлoжку
            function () { // пoсле выпoлнения предъидущей aнимaции
                $('.modals_div')
                    .animate({opacity: 0, top: '45%'}, 200,  // плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх
                        function () { // пoсле aнимaции
                            $(this).css('display', 'none'); // делaем ему display: none;
                        }
                    );

                $('#callback-form-thx')
                    .css('display', 'block') // убирaем у мoдaльнoгo oкнa display: none;
                    .animate({opacity: 1, top: '50%'}, 200); // плaвнo прибaвляем прoзрaчнoсть oднoвременнo сo съезжaнием вниз
            });

    });
    close.click(function () { // лoвим клик пo крестику или oверлэю
        $('.modals_div, .modals_di')
            .animate({opacity: 0, top: '45%'}, 200, // плaвнo прячем
                function () { // пoсле этoгo
                    $(this).css('display', 'none');
                    overlay.fadeOut(400); // прячем пoдлoжку
                }
            );
    });
    /*modal reclama page*/


    //Отправка письма со страницы рекламы
    $(document).on('click', '#msg_reclama', function () {
        //var csrf = $("input[name='_csrf']").val();
        var text = $("textarea[name='reclama_text']").val();
        var mail = $("input[name='reclama_mail']").val();
        var name = $("input[name='reclama_name']").val();
        $.ajax({
            type: 'POST',
            url: "/site/msg_reclama",
            data: 'text=' + text + '&mail=' + mail + '&name=' + name,
            success: function (data, event) {



            }
        });

    });


});
(function ( $ ) {
    $.fn.progress = function() {
        var percent = this.data("percent");
        this.css("width", percent+"%");
    };
}( jQuery ));


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
function propChecked() {
    var id = '';
    $('.ads-check').each(function () {
        if ($(this).prop('checked')) {
            id += $(this).val() + ',';
        }
    });
    console.log(id);
    return id;
}