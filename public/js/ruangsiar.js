$(function () {
    connectedUser();
    ignoreList();

    function ignoreList() {
        $.get('/api/ignore/list', function (r) {
            var source = $("#hb-ignore").html();
            var template = Handlebars.compile(source);
            $("#ignore-list").html(template(r)).slideDown('slow');
            //$("#text-reload-crowd").html('reload');
            $(".timeago").timeago();
            playlist();
        });
    }

    function playlist() {
        $("#text-reload-crowd").html('loading...');
        $.get('/api/playlist/', function (r) {
            var source = $("#hb-playlist").html();
            var template = Handlebars.compile(source);
            $("#playlist").html(template(r)).slideDown('slow');
            $("#text-reload-crowd").html('reload');
        });
    }


    function connectedUser() {
        $("#text-reload-connected-user").html('loading...');
        var u = $("#current-program-name").attr('data-id');
        $.get('/api/listeners/' + u, function (r) {
            var source = $("#hb-listeners").html();
            var template = Handlebars.compile(source);
            $("#listeners-list").html(template(r)).slideDown('slow');
            $("#text-reload-connected-user").html('');
            $(".timeago").timeago();
        });
    }

    //change program
    $(".program-change").click(function () {
        var u = $(this).attr('href');
        $.get(u, function (r) {
            location.reload();
        });
        return false;
    });


    //reload connected user
    $("#btn-reload-connected-user").click(function () {
        connectedUser();
        return false;
    });

    //reload the playlist
    $("#btn-reload-crowd").click(playlist);

    //ignore 
    $("#playlist").on('click', '.btn-ignore', function () {
        var id = $(this).attr('data-id');
        $.get('/api/ignore/' + id, function (r) {
            playlist();
            ignoreList();
        });

        return false;
    });


    //reload the ignore 
    $("#btn-reload-ignore").click(function () {
        ignoreList();
        return false;
    })


    // remove ignore action
    $("#ignore-list").on('click', '.btn-remove-ignore', function () {
        var id = $(this).attr('data-id');
        $.get('/api/ignore/' + id + '/remove', function (r) {
            playlist();
            ignoreList();
        });

        return false;
    });
    
    // removeall ignore action
    $("#btn-delete-ignore").on('click', function () {
        $.get('/api/ignore/removeall', function (r) {
            playlist();
            ignoreList();
        });

        return false;
    });
});