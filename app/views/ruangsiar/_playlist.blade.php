<tr>
    <td>
        <a href="#" class="btn-liked-member" data-id="@{{id}}"><span class="label label-default">@{{liked_member}}</span></a>
        &nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="btn-similar-artist" data-id="@{{id}}">@{{artist}}</a>
    </td>
    <td>
        <ul class="list-unstyled">
            @{{#each songs}}
            <li class="">@{{bpm}}</li>
            @{{/each}}
        </ul>
    </td>
    <td>
        <ul class="list-unstyled">
            @{{#each songs}}
            <li class="">@{{title}}</li>
            @{{/each}}
        </ul>
    </td>
    <td>
        <ul class="list-unstyled">
            @{{#each songs}}
            <li class=""><a href="#" class="btn-similar-genre" data-id="@{{genre_id}}" data-artist_id="@{{artist_id}}">@{{name}}</a></li>
            @{{/each}}
        </ul>
    </td>
    <td>
        <ul class="list-unstyled">
            @{{#each songs}}
            <li class=""><a href="#" class="btn-similar-year" data-year="@{{release_year}}" data-artist_id="@{{artist_id}}">@{{release_year}}</a></li>
            @{{/each}}
        </ul>
    </td>
    <td>
        <button class="btn btn-xs btn-danger btn-ignore" data-id="@{{id}}">ignore</button>
    </td>
</tr>