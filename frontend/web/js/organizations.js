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
        $.ajax({
            type: 'POST',
            url: "/site/get_city_widget",
            data: '',
            success: function (data) {
                var span = document.createElement('span');
                $(span).html(data);
                $(span).insertBefore(obj);
                //
                initS2Loading('test','s2options_d6851687');
                $('#test').css({display:'block'});
            }
        });
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