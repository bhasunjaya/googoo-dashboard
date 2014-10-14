@extends('master')

@section('css')
@stop

@section('javascripts')
@stop

@section('content')
<h3>Artis Database</h3>
<div class="row">

    <div class="col-xs-9">

        <div class="panel panel-default">
            <div class="panel-heading">
                <form id="search-form" method="GET" action="{{URL::to('artist')}}">
                    <div class="input-group custom-search-form">
                        <input type="text" name="q" value="{{Input::get('q')}}" class="form-control"  placeholder="search artist by name" id="search-query">
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
                        <th>Artist</th>
                        <th>Last Update</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($artists as $artist)
                    <tr>
                        <td>
                            <strong><a href="{{URL::to('artist/show/'.$artist->id)}}">{{$artist->name}}</a></strong>
                            <p class="text-small">
                                @foreach($artist->genres as $genre)
                                <small>{{$genre->name}}.</small>
                                @endforeach
                            </p>
                        </td>
                        <td><small class="text-muted">{{substr($artist->modified_at,0,16)}}</small></td>
                        <td>
                            <a href="{{URL::to('artist/edit/'.$artist->id)}}" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil"></span></a>
                        </td>
                        <td>
                            <a href="{{URL::to('artist/delete/'.$artist->id)}}" class="btn btn-danger btn-xs btn-info"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$artists->appends(array('q' => Input::get('q')))->links()}}
    </div>



    <div class="col-xs-3">
    </div>
</div>

@stop