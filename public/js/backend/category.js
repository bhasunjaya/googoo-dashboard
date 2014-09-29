$(function() {
    $('.colorbox').colorbox();

    //pick
    $(".list-group-item a.text-danger").click(function() {
        $(this).html('loading....');
        $.ajax({
            url: $(this).attr('href'),
            type: 'DELETE',
            success: function(r) {
                $("#cat-" + r.data).hide();
            }
        });
        return false;
    });

    $("#form-create").submit(function() {

        $('.help-block').addClass('hide');
        $.post($(this).attr('action'), $(this).serialize(), function(r) {
            if (r.success) {
                location.reload();
            } else {
                $('.help-block').html(r.data);
                $('.help-block').removeClass('hide');
            }
        });

        return false;
    });
});