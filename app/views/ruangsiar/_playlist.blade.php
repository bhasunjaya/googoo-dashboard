<tr>
    <td>
        <a href="#" class="btn-liked-member" data-id="@{{id}}"><span class="label label-default">@{{liked_member}}</span></a>
        &nbsp;&nbsp;&nbsp;&nbsp;@{{artist}}
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
        <button class="btn btn-xs btn-danger btn-ignore" data-id="@{{id}}">ignore</button>
    </td>
</tr>