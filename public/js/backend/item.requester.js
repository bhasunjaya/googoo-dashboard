$(function() {

    var siteurl = $("meta[name=siteurl]").attr('content');

    reloadData();

    function reloadData() {
        var id = $("#requester").attr('data-item-id');
        $.get(siteurl + '/api/requester', {id: 2}, function(r) {
            if (r.success) {
                var source = $("#hb-data-requesters").html();
                var template = Handlebars.compile(source);
                $("#data-requesters").html(template(r));
            }
        });
    }

    $("#data-requesters").on('click', '.profile', function() {
        $.get($(this).attr('href'), function(r) {
            if (r.success) {
                var source = $("#hb-profile-requesters").html();
                var template = Handlebars.compile(source);
                $("#profile-requesters").html(template(r.data));
            }
        });
        return false;
    });
    $("#profile-requesters").on('click', '.btn-request', function() {
        var id = $(this).attr('data-id');
        $.ajax({
            type: "PUT",
            url: siteurl + '/api/requester/' + id,
            data: {"status_approved": $(this).attr('data-status')}
        }).done(function(r) {
            reloadData();
        });
        return false;
    });

    $("#profile-requesters").on('click', '#link-survey', function() {
        var id = $(this).attr('data-id');
        $.get(siteurl + '/api/survey/requester', {id: id}, function(r) {
            console.log(r);
            if (r.success) {
                var source = $("#hb-profile-survey").html();
                var template = Handlebars.compile(source);
                $("#profile-survey").html(template(r.data));
                $('#win-survey').modal('show');
            }
        });
        return false;
    });



    Handlebars.registerHelper('socmed', function(text) {
        var s = jQuery.parseJSON(text);
        var t = '';
        $.each(s, function(c, cs) {
            t = t + '' + c + ' : ' + cs + '</br>';
        })
        t = t + '';
        return new Handlebars.SafeString(t);
    });

    Handlebars.registerHelper('status', function(status, name) {
        switch (status)
        {
            case "rejected":
                return new Handlebars.SafeString('<span class="text-muted"><del>' + name + '</del></span>');
                break;

            case "approved":
                return new Handlebars.SafeString('<span class="label label-info "><strong>' + name + '</strong></span>');
                break;

            default:
                return new Handlebars.SafeString(name);
                break;
        }
    });

});