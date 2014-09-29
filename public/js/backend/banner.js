$(function() {
    $('.colorbox').colorbox();

    $(".banner-delete").click(function() {
        $(this).html('loading....');
        $.ajax({
            url: $(this).attr('href'),
            type: 'DELETE',
            success: function(r) {
                $("#banner-" + r.data).hide();
            }
        });
        return false;
    });
});