$(document).ready(function(){

    $(document).on('change','.itemImg',function(){
        var path = $(this).val();
        $(this).closest('.imgUpload').find('.media__upload_img').html('<img src="' +path + '" width="100px"/> <br>')
    });

    $(document).on('click','#category-show_menu',function(){
        if($(this).prop('checked')){
            $('.imagesMenu').css('display','block');
        }else{
            $('.imagesMenu').css('display','none');
        }
    });

    $(document).on('change', '.editStatus', function(){
        var id = $(this).data('id');
        var status = $(this).val();
        var csrf = $(this).data('csrf');
        $.ajax({
            type: 'POST',
            url: "/secure/itemsmanager/itemsmanager/edit_status",
            data: 'id=' + id + '&status=' + status + '&_csrf=' + csrf,
            success: function (data) {

            }
        });
    });

    $(document).on('click', '.deleteImgAjax', function () {
        var element = $(this).closest('.ads_img');
        $.ajax({
            type: 'POST',
            url: "/secure/itemsmanager/itemsmanager/delete-img",
            data: {id: $(this).data('id'), type: $(this).data('type')},
            success: function (data) {
                console.log(data);
                element.remove();
            }
        });
        return false;
    });

});