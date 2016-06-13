$(document).ready(function(){
    $(document).on('click', '.ruleRegister', function(){
       if($(this).prop('checked')){
           $('.reg__form--btn').prop('disabled', false);
       }else{
           $('.reg__form--btn').prop('disabled', true);
       }
    });


    $(document).on('click', '.generalModalCategory', function(){
        $.ajax({
            type: 'POST',
            url: "/adsmanager/ads_add/general_modal",
            data: '',
            success: function (data) {
                $('.modal-body,.modal-flex').html(data);
                $('#modalType').modal('show');
            }
        });
    });

    $(document).on('click', '.modal-body__container', function(){
        var catId = $(this).data('category');
        $.ajax({
            type: 'POST',
            url: "/adsmanager/ads_add/show_category",
            data: 'id=' + catId,
            success: function (data) {
                /*$('.modal-body,.modal-flex').html(data);*/
                if(data){
                    $('.modal-body,.modal-flex').html(data);
                }else{
                    $.ajax({
                        type: 'POST',
                        url: "/adsmanager/ads_add/show_category_end",
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
        var column = $(this).parent().data('parent');
        $.ajax({
            type: 'POST',
            url: "/adsmanager/ads_add/show_parent_category",
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
                        url: "/adsmanager/ads_add/show_category_end",
                        data: 'id=' + category,
                        success: function (data) {
                            $('.SelectCategory').html(data);
                        }
                    });
                    $('#modalType').modal('hide');
                }


            }
        });
    });
});
