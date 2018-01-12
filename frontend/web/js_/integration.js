/**
 * Created by apuc0 on 09.01.2018.
 */
$(document).ready(function () {
    $('#add_vk_btn').on('click', function (e) {
        e.preventDefault();
        var link = $('#vk_link').val();
        $.ajax({
            type: 'POST',
            url: "/personal_area/integration/set-link",
            data: {
                link: link
            },
            success: function (data) {
                $('#vk_integration_box').html(data);
            }
        });
    })
});