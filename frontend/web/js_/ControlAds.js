$(document).ready(function () {
    $(document).on('click', '.ads-control-ads-test', function () {
        var id = $(this).attr('data-id');
        var act = $(this).attr('data-act');

        $.ajax({
            type: 'POST',
            url: "/control/get-ads-edit-status",
            data: {
                id: id,
                act: act
            },
            success: function (data) {
                $('.modal-body,.modal-flex').html(data);
                $('#modalAds').modal('show');
            }
        });
        return false;
    });


    $(document).on('click', '.no-control-ads', function () {
        $('#modalAds').modal('hide');
        return false;
    });

    $(document).on('click', '.yes-control-ads', function () {
        var id = $(this).attr('data-id');
        var act = $(this).attr('data-act');

        $.ajax({
            type: 'POST',
            url: "/control/ads-control-status-edit",
            data: {
                id: id,
                act: act
            },
            success: function (data) {
                $('#modalAds').modal('hide');
                //console.log(data);

            }
        });
        return false;
    });
});
