
@{{#each data}}
<tr>
    <td>
        @{{artist.name}}
        <small class="pull-right text-muted timeago" title="@{{created_at}}">@{{created_at}}</small>
    </td>
    <td>
        <button class="btn btn-xs btn-danger btn-remove-ignore pull-right" data-id="@{{artist.id}}">delete</button>
    </td>
</tr>
@{{/each}}