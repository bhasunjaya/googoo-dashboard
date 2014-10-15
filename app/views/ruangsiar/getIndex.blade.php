@extends('master')

@section('css')
@stop

@section('javascripts')
<script type="text/javascript" src="{{asset('js/handlebars.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.timeago.js')}}"></script>
<script type="text/javascript" src="{{asset('js/ruangsiar.js')}}"></script>
@stop

@section('content')
<h3>Ruang Siar</h3>
<hr/>
<div class="row">
    <div class="col-xs-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Crowd Songs 
                <a href="#" class="btn btn-primary btn-xs pull-right" id="btn-reload-crowd">
                    <i class="glyphicon glyphicon-refresh"></i> 
                    <span id="text-reload-crowd">reload</span>
                </a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-xs-4">Artist</th>
                        <th class="col-xs-1">BPM</th>
                        <th>Songs</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody id="playlist"></tbody>
            </table>
        </div>
    </div>



    <div class="col-xs-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                Programs
                <div class="pull-right action-buttons">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-cog" style="margin-right: 0px;"></span> change
                        </button>
                        <ul class="dropdown-menu slidedown">
                            @foreach($programs as $p)
                            <li><a href="{{URL::to('/api/program/change/'.$p->id)}}" class="program-change">{{$p->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div id="program-current">
                    <h4 id="current-program-name" data-id="{{$currentProgram->id}}">{{$currentProgram->name}}</h4>
                    <p>
                        BPM 
                        <span  id="current-program-minbpm">{{$currentProgram->min_bpm}}</span> - 
                        <span  id="current-program-maxbpm">{{$currentProgram->max_bpm}}</span>
                    </p>
                    <p>
                    </p>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            Ignore List
                        </th>
                        <th>
                            <a href="{{URL::to('/api/ignore/list')}}" class="btn btn-primary btn-xs pull-right" id="btn-reload-ignore">
                                <i class="glyphicon glyphicon-refresh"></i> 
                                <span id="text-reload-ignore"></span>
                            </a>&nbsp;
                            <a href="{{URL::to('/api/ignore/removeall')}}" class="btn btn-danger btn-xs pull-right" id="btn-delete-ignore">
                                delete all
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody  id="ignore-list">

                </tbody>
            </table>
            <hr/>
            <table class="table table-hover table-bordered" >
                <thead>
                    <tr>
                        <th>
                            <a href="{{URL::to('/api/listeners/'.$currentProgram->id)}}" class="btn btn-primary btn-xs pull-right" id="btn-reload-connected-user">
                                <i class="glyphicon glyphicon-refresh"></i> 
                                <span id="text-reload-connected-user"></span>
                            </a>
                            Listeners</th>
                    </tr>
                </thead>
                <tbody  id="listeners-list">
                </tbody>
            </table>

        </div>



        <div class="panel panel-default">
            <div class="panel-heading"><strong>Fave Artist But No Song</strong></div>
            <div id="nosong-list" style="height:200px;overflow: auto;">
                <div class="list-group" style="display: block;">
                    @foreach($nosongs as $s)
                    <a href="{{URL::to('artist/show/'.$s->id)}}" class="list-group-item">{{$s->name}} <span class="badge pull-right">{{$s->total}} </span></a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <a class="twitter-timeline" href="https://twitter.com/search?q=%40googooradio" data-widget-id="519074417914040320">Tweets about "@googooradio"</a>
            <script>!function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
    if (!d.getElementById(id)) {
        js = d.createElement(s);
        js.id = id;
        js.src = p + "://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);
    }
}(document, "script", "twitter-wjs");</script>
        </div>


    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="likedMemberModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
</div>


<script id="hb-listeners" type="text/x-handlebars-template">
    @include('ruangsiar._listeners')
</script>

<script id="hb-playlist" type="text/x-handlebars-template">
    @{{#each data}}
    @include('ruangsiar._playlist');
    @{{/each}}
</script>

<script id="hb-likedmember" type="text/x-handlebars-template">
    @include('ruangsiar._likedmember');
</script>

<script id="hb-ignore" type="text/x-handlebars-template">
    @include('ruangsiar._ignore')
</script>

@stop