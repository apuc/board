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
                            $('.SelectCategory').html(data);
                        }
                    });
                    $('#modalType').modal('hide');

                    $.ajax({
                        type: 'POST',
                        url: "/adsmanager/adsmanager/show_additional_fields",
                        data: 'id=' + category,
                        success: function (data) {
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