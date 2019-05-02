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

    //Загрузка объявлений
    $(document).on('click', '#load-c', function () {
        let page = $(this).attr('data-page');
        console.log(page);
        $.ajax({
            type: 'GET',
            url: "/mainpage/mainpage/load-cards",
            data: {page:page, _csrf: yii.getCsrfToken()},
            success: (data) =>  {
                $('.cards').append(data);
                $cg('.masonry').masonry().reInit();
                $(this).attr('data-page', Number(page) + 1);
            }
        });

        return false;
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
