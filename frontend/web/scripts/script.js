$(document).ready(function () {

    //ПОКАЗАТЬ НОМЕР ТЕЛЕФОНА
    $(document).on('click', '.showPhone', function () {
        //alert(123);
        var obj = $(this);
        var id = $(this).data('id');
        obj.removeClass('showPhone');
        $.ajax({
            type: 'POST',
            url: "/site/show_phone",
            data: {id:id, _csrf: yii.getCsrfToken()},
            success: function (data) {
                obj.html(data);
            }
        });

        return false;
    });

    $(document).on('keyup', '#citySearch', function(e) {
        var text = $(this).val();
        $.ajax({
            type: 'POST',
            url: "/site/get-city",
            data: {text: text, _csrf: yii.getCsrfToken()},
            success: function (data) {
                console.log(data);
                $('#cityList').html(data);
            }
        });
    });

    //Подгрузка объявлений
    $(document).on('click', '#load-c', function () {
        let page = $(this).attr('data-page');
        console.log(page);
        $.ajax({
            type: 'GET',
            url: "/mainpage/mainpage/load-cards",
            data: {p:page},
            success: (data) =>  {
                if(data) {
                    console.log(data);
                    $('.cards').append(data);
                    $cg('.masonry').masonry().reInit();
                    $(this).attr('data-page', Number(page) + 1);
                }else{
                    $(this).css('pointer-events', 'none');
                }
            }
        });

        return false;
    });

    //Добавление в Favourites
    $(document).on('click', '.add-in-fav',function (e) {

        let itemType = $(this).data('gist');
        let gistId = $(this).data('gistid');
        let url = '';
        if($(this).hasClass('in-fav')){
            $(this).removeClass('in-fav');
            // $(this).css('color', 'white');
            url = '/favorites/default/del_favorites';
        }else{
            $(this).addClass('in-fav');
            url = '/favorites/default/add_favorites';
        }

        $.ajax({
           url: url,
            type: 'POST',
            data: {gist:itemType,gistId:gistId,_csrf: yii.getCsrfToken()},
            success: function (data) {

            }//success
        });


    });


    //Отправка формы поиска
    $(document).on('click', '#send-filter', function (e) {
        e.preventDefault();
        let globalS = $('#global-search').val();
        $('[name=textFilter]').val(globalS);
        $('#filterform').submit();
        return false;
    });
});
