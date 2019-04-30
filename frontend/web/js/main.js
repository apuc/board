$(document).ready(function () {
    $("#load_more").on("click",function () {

        var offset = $(this).attr("data-offset");

        $.ajax({
            type:"POST",
            url:"/",
            data:{"offset":offset},
            success:function (response) {

                $(".cards").append(response);
                $cg('.masonry').masonry().reInit();
            }
        });

        $(this).attr("data-offset",parseInt(offset)+16);
    });
});