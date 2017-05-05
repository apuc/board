$(document).ready(function(){

    var countInput = new Characters();
    countInput.setInput('#organizations-title','#title-count-res');
    countInput.setInput('#organizations-descr','#descr-count-res');

    $('#showOrgModal').on('click',function(){
        $('#categoryOrgModal').modal('show');
    });

    $('.active').each(function(){
        $(this).closest('ul').slideDown();
        $(this).closest('.has-sub').addClass('open');
    });

    $(document).on('click', '.dopPhone', function(){
        var index = $(this).attr('data-index');
        var formLine = document.createElement('div');
        var input = document.createElement('input');
        var span = document.createElement('span');
        formLine.classList.add('form-line');
        span.classList.add('delete-line');
        span.classList.add('delPhone');
        formLine.innerHTML = '<label class="label-name">Телефон</label>';
        $(input).attr('name', 'orgPhone[' + index + '][]');
        input.classList.add('input-small');
        $(formLine).append(input);
        $(formLine).append(span);
        $(formLine).insertBefore($(this).prev());
        return false;
    })
    
    $(document).on('click', '.delPhone', function () {
        var obj = $(this).closest('.form-line');
        obj.remove();
        return false;
    })

    $(document).on('click', '.delAddress', function () {
        var obj = $(this).closest('.wrap-line').parent();
        obj.remove();
        return false;
    })

    $('.dopAddress').on('click', function () {
        var obj = $(this);
        var code = genCode();
        if(document.getElementsByClassName('wrap-line').length > 99) {
            alert('Для добавления большего количества адресов обратитесь в службу поддержки.');
            return false;
        }
        $.ajax({
            type: 'POST',
            url: "/site/get_city_widget",
            data: {code:code},
            success: function (data) {
                var span = document.createElement('span');
                $(span).html(data);
                $(span).insertBefore(obj);
                //
                $('#' + code).select2({
                    tags: "true",
                    placeholder: "Начните наберать название Вашего города",
                    allowClear: true
                });
            }
        });
        return false;
    });

    $(document).on('click','.category-org-item, .select-category-org-parent-item',function () {
        var id = $(this).attr('data-id');
        $.ajax({
            type: 'POST',
            url: "/site/get_category_modal",
            data: {id:id},
            success: function (data) {
                $('.modal-body').html(data);
            }
        });
        return false;
    });

    $(document).on('click', '.select-category-org-child-item',function () {
        var id = $(this).attr('data-id');
        $.ajax({
            type: 'POST',
            url: "/site/select_sub_category",
            data: {id:id},
            success: function (data) {
                $('.place-ad__form').html(data);
                $('#categoryOrgModal').modal('hide');
                $('#category_input').val(id);
            }
        });
    });

    if(document.getElementById('file-cover')){
        document.getElementById('file-cover').onchange = function (e) {
            img('#file-cover').getPreview('#org-cover');
        }
    }

    if(document.getElementById('file-logo')){
        document.getElementById('file-logo').onchange = function (e) {
            img('#file-logo').getPreview(false, function (target,src) {
                var logo = document.getElementById('org-logo');
                logo.style.backgroundImage = "url('" + src + "')";
            })
        }
    }

    //Показать адреса филиалов организации
    $(document).on('click', '.show-more-org', function () {
        var id = $(this).data('id');
        var csrf = $(this).data('csrf');
        $.ajax({
            type: 'POST',
            url: "/site/show_address_filial",
            data: {
                id:id,
                _csrf:csrf
            },
            success: function (data) {
                //console.log(data);
                $('.addFilial').html(data);
            }
        });
        return false;
    } );


    //Удаление из избранного организаций
    $(document).on('click', '.delete-favorites-org', function(){
        var id = propCheckedOrg();
        var csrf = $(this).data('csrf'),
            ads = $(this).data('ads'),
            page = $(this).data('page');
        if (id == '') {
            $.confirm({
                'title': 'Вы ни чего не выбрали!',
                'message': 'Выберите организации которые хотите удалить из избранного',
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
                'title': 'Вы уверены!',
                'message': 'Вы уверены что хотите удалить из избранного выделенные организации',
                'buttons': {
                    'Да': {
                        'class': 'blue',
                        'action': function () {
                            //alert(123);
                            $.ajax({
                                type: 'POST',
                                url: "/personal_area/favorites/delete_all_favorites",
                                data: 'id=' + id + '&_csrf=' + csrf + '&ads=' + ads + '&page=' + page,
                                success: function (data) {
                                    //console.log(data);
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

    //Удалить одну организацию
    $(document).on('click', '.remove-organization', function () {
        var id = $(this).data('id');
        var csrf = $(this).data('csrf'),
            org = $(this).data('org'),
            page = $(this).data('page');
        var elem = $(this).closest('.item');
        $.confirm({
            'title': 'Вы действительно хотите удалить организацию?',
            'message': 'Вы собираетесь удалить организацию! Если Вы удалите эту организацию то востановить ее уже не будет возможным! Так же удалятся все объявления размещонные от лица компании <br />Вы уверены?',
            'buttons': {
                'Да': {
                    'class': 'blue',
                    'action': function () {
                        elem.remove();
                        $.ajax({
                            type: 'POST',
                            url: "/personal_area/org/delete",
                            data: 'id=' + id + '&_csrf=' + csrf + '&org=' + org + '&page=' + page,
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

    //Удалить все выбраные организации
    $(document).on('click', '.delete-all-org', function () {
        var id = propCheckedOrg();
        var csrf = $(this).data('csrf'),
            org = $(this).data('org'),
            page = $(this).data('page');
        if (id == '') {
            $.confirm({
                'title': 'Вы ни чего не выбрали!',
                'message': 'Выберите организации которые хотите удалить',
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
                'title': 'Вы уверены!',
                'message': 'Вы уверены что хотите удалить выделенные организации. С организациями удалятся и объявления принадлежащие им',
                'buttons': {
                    'Да': {
                        'class': 'blue',
                        'action': function () {
                            //alert(123);
                            $.ajax({
                                type: 'POST',
                                url: "/personal_area/org/delete_all",
                                data: 'id=' + id + '&_csrf=' + csrf + '&org=' + org + '&page=' + page,
                                success: function (data) {
                                    //console.log(data);
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


});

function genCode(length){
    length = length || 8;
    var result = '';
    // allowed characters
    var symbols = [
        'q','w','e','r','t','y','u','i','o','p',
        'a','s','d','f','g','h','j','k','l',
        'z','x','c','v','b','n','m',
        'Q','W','E','R','T','Y','U','I','O','P',
        'A','S','D','F','G','H','J','K','L',
        'Z','X','C','V','B','N','M',
        1,2,3,4,5,6,7,8,9,0
    ];
    for (var i = 0; i < length; i++){
        result += symbols[makeRand(symbols.length)];
    }
    return result;
}

function makeRand(max){
    return Math.floor(Math.random() * max);
}

//Собираем все нажатые чекбоксы
function propCheckedOrg() {
    var id = '';
    $('.org-check').each(function () {
        if ($(this).prop('checked')) {
            id += $(this).val() + ',';
        }
    });
    console.log(id);
    return id;
}