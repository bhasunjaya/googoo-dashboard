
@{{#each data}}
<tr>
    <td>@{{name}} <small class="pull-right text-muted timeago" title="@{{created_at}}">@{{created_at}}</small></td>
</tr>
@{{/each}}