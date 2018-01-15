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
                try {
                    var json = JSON.parse(data);
                    $('#vk-parse-status').html(json.error);
                }
                catch (e) {
                    $(data).insertAfter('#insert-point');
                }
            }
        });
    });

    $(document).on('change', '.selB', function () {
        var groupId = $(this).attr('data-group-id');
        if ($(this).val() == 1) {
            $('.sb_' + groupId).show();
        }
        else {
            $('.sb_' + groupId).hide();
        }
    });

    $(document).on('click', '#vk_del_group', function (e) {
        e.preventDefault();
        $(this).closest('.group-item').remove();
        $.ajax({
            type: 'POST',
            url: "/personal_area/integration/del-group",
            data: {
                id: $(this).attr('data-id')
            },
            success: function (data) {
                console.log(data);
            }
        });
    });

    $(document).on('click', '.vk_update_group', function (e) {
        e.preventDefault();
        var groupId = $(this).attr('data-group-id');
        var link = $(this);
        $.ajax({
            type: 'POST',
            url: "/personal_area/integration/update-group",
            data: {
                id: groupId
            },
            success: function (data) {
                link.closest('.group-item').html(data);
            }
        });
    });

    $(document).on('click', '.vk-save-prod', function (e) {
        e.preventDefault();
        var groupId = $(this).attr('data-group-id');
        var sb = $('.sbi_' + groupId), sbVal;
        var chOrB = $('.s1_' + groupId).val();
        var phone = $('.vk-ads-phone_' + groupId).val();
        var objBtn = $(this);
        var getGoods = objBtn.closest('.get-goods');
        objBtn.closest('.get-goods').html('<img src="/img/icons/giphy.gif" style="width: 150px;display: block;margin: 0 auto">');
        if(chOrB == 1){
            if(sb.length > 0){
                sbVal = sb.val();
            }
            else {
                sbVal = 0
            }

        }
        $.ajax({
            type: 'POST',
            url: "/personal_area/integration/add-prod",
            data: {
                id: groupId,
                chOrB: chOrB,
                sbVal: sbVal,
                phone: phone
            },
            success: function (data) {
                //getGoods.html(data);
                getGoods.html('<span>Добавленно ' + data + ' товаров</span>');
            }
        });
    })
});