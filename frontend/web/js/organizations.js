$(document).ready(function(){

    var countInput = new Characters();
    countInput.setInput('#organizations-title','#title-count-res');
    countInput.setInput('#organizations-descr','#descr-count-res');

    $('#showOrgModal').on('click',function(){
        $('#categoryOrgModal').modal('show');
    });

    $(document).on('click', '.dopPhone', function(){
        var index = $(this).attr('data-index');
        var formLine = document.createElement('div');
        var input = document.createElement('input');
        formLine.classList.add('form-line');
        formLine.innerHTML = '<label class="label-name">Телефон</label>';
        $(input).attr('name', 'orgPhone[' + index + '][]');
        input.classList.add('input-small');
        $(formLine).append(input);
        $(formLine).insertBefore($(this).prev());
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