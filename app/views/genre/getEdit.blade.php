@extends('master')

@section('css')
@stop

@section('javascripts')
@stop

@section('content')
@if(Session::get('message'))
<div class="alert alert-success">{{Session::get('message')}}</div>
@endif
<div class="row">

    <div class="col-xs-6">
        <h3>Edit {{$genre->name}}</h3>
        <form role="form" action="{{URL::current()}}" method="POST">
            <div class="form-group @if($errors->has('name')) has-error  has-feedback @endif">
                <label class="control-label" for="name">Name</label>
                <input type="input" class="form-control" id="name" name="name" value="{{Input::old('name',$genre->name)}}">
                @if($errors->has('name'))
                <p class="help-block">{{$errors->first('name')}}</p>
                @endif
            </div>
            <button type="submit" class="btn btn-info">Submit</button>
        </form>
    </div>

    <div class="col-xs-6">
        <h3>Artist Bergenre Ini</h3>
        <div class="list-group">
            @foreach($genre->artists as $artist)
            <a href="{{URL::to('artist/show/'.$artist->id)}}" class="list-group-item">{{$artist->name}}</a>
            @endforeach
        </div>
        </table>
    </div>
</div>

@stop