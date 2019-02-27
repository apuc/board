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
});
