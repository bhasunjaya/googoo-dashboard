@extends('master')

@section('css')
@stop

@section('javascripts')
@stop

@section('content')
<h3>Lagu  Database</h3>
<div class="row">

    <div class="col-xs-9">

        <div class="panel panel-default">
            <div class="panel-heading">
                <form id="search-form" method="GET" action="{{URL::to('song')}}">
                    <div class="input-group custom-search-form">
                        <input type="text" name="q" value="{{Input::get('q')}}" class="form-control"  placeholder="search song by title" id="search-query">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" id="search-button">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div><!-- /input-group -->
                </form>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Song</th>
                        <th class="col-xs-3">Artist</th>
                        <th class="col-xs-1">BPM</th>
                        <th class="col-xs-2">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($songs as $song)
                    <tr>
                        <td>
                            <p>
                                <strong style="display:block">{{$song->title}}</strong>
                                {{$song->album}}  ({{$song->release_year}})
                                <br/>{{$song->genre}}
                            </p>
                        </td>
                        <td><a href="{{URL::to('artist/show/'.$song->artist_id)}}">{{$song->dbartist}}</a></td>
                        <td>{{$song->bpm}}</td>
                        <td class="text-right">
                            <a href="{{URL::to('song/edit/'.$song->id)}}" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="{{URL::to('song/delete/'.$song->id)}}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$songs->appends(array('q' => Input::get('q')))->links()}}
    </div>

    <div class="col-xs-3">
        <a href="{{URL::to('song/preimport')}}" class="btn btn-block btn-info">import new songs</a>
    </div>
</div>

@stop