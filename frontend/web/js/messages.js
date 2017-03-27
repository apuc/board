$(document).ready(function () {
    if(document.getElementById('msgBox')){
        var msgBox = document.getElementById('msgBox');
        msgBox.scrollTop = 99999;

        setInterval(function () {
            $.ajax({
                type: 'POST',
                url: "/message/default/get_msg",
                data: {
                    to: $('#sendMsg').attr('data-to'),
                    from: $('#sendMsg').attr('data-from')
                },
                success: function (data) {
                    if(data !== '0'){
                        $('#msgBox').html(data);
                        var msgBox = document.getElementById('msgBox');
                        msgBox.scrollTop = 99999;
                    }
                }
            });
            $.ajax({
                type: 'POST',
                url: "/message/default/get_interlocutor",
                data: {
                    to: $('#sendMsg').attr('data-to'),
                    from: $('#sendMsg').attr('data-from')
                },
                success: function (data) {
                    if(data !== '0'){
                        $('#interlocutorBox').html(data);
                    }
                }
            });
        }, 5000)
    }

    $('#sendMsg').on('click', function () {
        var msg = $('#textMsg').val();
        $.ajax({
            type: 'POST',
            url: "/message/default/send_msg",
            data: {
                msg: msg,
                to: $(this).attr('data-to'),
                from: $(this).attr('data-from')
            },
            success: function (data) {
                $('#msgBox').html(data);
                var msgBox = document.getElementById('msgBox');
                msgBox.scrollTop = 99999;
            }
        });
        $('#textMsg').val('');
        return false;
    });
});