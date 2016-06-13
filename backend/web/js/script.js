$(document).ready(function(){

    $(document).on('change','.itemImg',function(){
        var path = $('.itemImg').val();
        $('.media__upload_img').html('<img src="' +path + '" width="100px"/> <br>');
    });

    $(document).on('click','#category-show_menu',function(){
        if($(this).prop('checked')){
            $('.imagesMenu').css('display','block');
        }else{
            $('.imagesMenu').css('display','none');;
        }
    });


});