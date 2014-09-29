@extends('master')

@section('css')
@stop

@section('javascripts')
@stop

@section('content')
<h3>Create New Program</h3>
<div class="row">

    <div class="col-xs-6">
        @if($errors->all())
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach($errors->all() as $e)
                <li>{{$e}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {{Form::open(array('url' => 'program/'.$program->id,'method'=>'PUT'))}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="input" class="form-control" id="name" name="name" placeholder="name of program" value="{{Input::old('name',$program->name)}}">
        </div>
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="min_bpm">Min BPM</label>
                    <input type="input" class="form-control" id="min_bpm" name="min_bpm" value="{{Input::old('min_bpm',$program->min_bpm)}}">
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="max_bpm">Max BPM</label>
                    <input type="input" class="form-control" id="max_bpm" name="max_bpm" value="{{Input::old('max_bpm',$program->max_bpm)}}">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-default btn-info ">Submit</button>
        {{Form::close()}}
    </div>
</div>

@stop