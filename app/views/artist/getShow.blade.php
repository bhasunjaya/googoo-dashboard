@extends('master')

@section('css')
@stop

@section('javascripts')
@stop

@section('content')
<h3>{{$artist->name}}</h3>
<div class="row">

    <div class="col-xs-9">
        @if(Session::get('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
        @endif
        <div class="panel panel-default">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>{{$artist->name}}</td>
                    </tr>
                    <tr>
                        <td>Genre</td>
                        <td>
                            @foreach($artist->genres as $genre)
                            {{$genre->name}},
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>FB PAGE</td>
                        <td>
                            @foreach($artist->fbartist as $page)
                            {{$page->name}}
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Data Lagu</div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Song</th>
                        <th>Genre</th>
                        <th>Year</th>
                        <th>BPM</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($artist->songs as $song)
                    <tr>
                        <td>
                            <p>
                                <strong style="display:block">{{$song->title}}</strong>
                                {{$song->album}}
                            </p>
                        </td>
                        <td>{{$song->genre}}</td>
                        <td>{{$song->release_year}}</td>
                        <td>{{$song->bpm}}</td>
                        <td>
                            <a href="{{URL::to('song/edit/'.$song->id)}}" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="#" onclick="deletesong('{{$song->id}}')" class="btn btn-xs btn-danger btn-delete-song"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-xs-3">
        <a href="{{URL::to('artist/edit/'.$artist->id)}}" class="btn btn-block btn-info">Edit Artist</a>
    </div>
</div>
<script type="text/javascript">
    function deletesong(id){
        $.get('/song/delete/'+id, function (r) {
            top.location.href = '{{URL::full()}}';
        });
    }
    
</script>

@stop