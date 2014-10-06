$(function () {

    //change program
    $(".program-change").click(function () {
        var u = $(this).attr('href');
        $.get(u, function (r) {
            location.reload();
        });
        return false;
    });

});