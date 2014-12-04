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
    
    //likedmember 
    $("#playlist").on('click', '.btn-liked-member', function () {
        var id = $(this).attr('data-id');
        $.get('/api/likedmember/' + id, function (r) {
            var source = $("#hb-likedmember").html();
            var template = Handlebars.compile(source);
            $("#likedMemberModal").html(template(r)).slideDown('slow');
            $('#likedMemberModal').modal('show');
        });

        return false;
    });
    
    //similarartist 
    $("#playlist").on('click', '.btn-similar-artist', function () {
        var id = $(this).attr('data-id');
        $.get('/api/similarartist/' + id, function (r) {
            var source = $("#hb-similarartist").html();
            var template = Handlebars.compile(source);
            $("#similarArtistModal").html(template(r)).slideDown('slow');
            $('#similarArtistModal').modal('show');
        });

        return false;
    });
    
    //similargenre 
    $("#playlist").on('click', '.btn-similar-genre', function () {
        var id = $(this).attr('data-id');
        var artist_id = $(this).attr('data-artist_id');
        $.get('/api/similargenre/' + id+'/artistid/'+artist_id, function (r) {
            var source = $("#hb-similargenre").html();
            var template = Handlebars.compile(source);
            $("#similarGenreModal").html(template(r)).slideDown('slow');
            $('#similarGenreModal').modal('show');
        });

        return false;
    });
    
    //similaryear 
    $("#playlist").on('click', '.btn-similar-year', function () {
        var year = $(this).attr('data-year');
        var artist_id = $(this).attr('data-artist_id');
        $.get('/api/similaryear/' + year+'/artistid/'+artist_id, function (r) {
            var source = $("#hb-similaryear").html();
            var template = Handlebars.compile(source);
            $("#similarYearModal").html(template(r)).slideDown('slow');
            $('#similarYearModal').modal('show');
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