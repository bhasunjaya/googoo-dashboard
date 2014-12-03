<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Similar Artists</h4>
        </div>
        <div class="modal-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-xs-4">Artist</th>
                        <th class="col-xs-1">BPM</th>
                        <th>Songs</th>
                    </tr>
                </thead>
                <tbody  id="ignore-list">
                    @{{#each data}}
                    <tr>
                        <td>
                            @{{artist}}
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
                    </tr>
                    @{{/each}}
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>