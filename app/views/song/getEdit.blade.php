@extends('master')

@section('css')
@stop

@section('javascripts')
@stop

@section('content')
<h3>Edit {{$song->title}}</h3>
<div class="row">
	
	<div class="col-xs-6">
		<form role="form" action="{{URL::current()}}" method="POST">
			<div class="form-group @if($errors->has('title')) has-error  has-feedback @endif">
				<label class="control-label" for="title">Title</label>
				<input type="input" class="form-control" id="title" name="title" value="{{Input::old('title',$song->title)}}">
				@if($errors->has('title'))
				<p class="help-block">{{$errors->first('title')}}</p>
				@endif
			</div>


			<div class="form-group @if($errors->has('artist')) has-error  has-feedback @endif">
				<label class="control-label" for="artist">artist</label>
				<input type="input" class="form-control" id="artist" name="artist" value="{{Input::old('artist',$song->artist)}}">
				@if($errors->has('artist'))
				<p class="help-block">{{$errors->first('artist')}}</p>
				@endif
			</div>


			<div class="form-group @if($errors->has('album')) has-error  has-feedback @endif">
				<label class="control-label" for="album">album</label>
				<input type="input" class="form-control" id="album" name="album" value="{{Input::old('album',$song->album)}}">
				@if($errors->has('album'))
				<p class="help-block">{{$errors->first('album')}}</p>
				@endif
			</div>


			<div class="form-group @if($errors->has('release_year')) has-error  has-feedback @endif">
				<label class="control-label" for="release_year">release_year</label>
				<input type="input" class="form-control" id="release_year" name="release_year" value="{{Input::old('release_year',$song->release_year)}}">
				@if($errors->has('release_year'))
				<p class="help-block">{{$errors->first('release_year')}}</p>
				@endif
			</div>


			<div class="form-group @if($errors->has('genre')) has-error  has-feedback @endif">
				<label class="control-label" for="genre">genre</label>
				<input type="input" class="form-control" id="genre" name="genre" value="{{Input::old('genre',$song->genre)}}">
				@if($errors->has('genre'))
				<p class="help-block">{{$errors->first('genre')}}</p>
				@endif
			</div>

			<div class="form-group @if($errors->has('bpm')) has-error  has-feedback @endif">
				<label class="control-label" for="bpm">bpm</label>
				<input type="input" class="form-control" id="bpm" name="bpm" value="{{Input::old('bpm',$song->bpm)}}">
				@if($errors->has('bpm'))
				<p class="help-block">{{$errors->first('bpm')}}</p>
				@endif
			</div>



			<button type="submit" class="btn btn-info">Submit</button>
		</form>
	</div>
</div>
@if($errors->all())
{{s($errors->all())}}
@endif
@stop