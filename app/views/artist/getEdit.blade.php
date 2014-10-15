@extends('master')

@section('css')
@stop

@section('javascripts')
@stop

@section('content')
<h3>Edit {{$artist->name}}</h3>
<div class="row">

    <div class="col-xs-6">
        <form role="form" action="{{URL::current()}}" method="POST">
            <div class="form-group @if($errors->has('name')) has-error  has-feedback @endif">
                <label class="control-label" for="name">Name</label>
                <input type="input" class="form-control" id="name" name="name" value="{{Input::old('name',$artist->name)}}">
                @if($errors->has('name'))
                <p class="help-block">{{$errors->first('name')}}</p>
                @endif
            </div>
            <div class="form-group @if($errors->has('genre')) has-error  has-feedback @endif">
                <label class="control-label" for="genre">Genre <span style="font-size: 9px">jika lebih dari satu pisahkan dengan koma (,)</span></label>
                <?php 
                    $genre_list = "";
                ?>
                @foreach($artist->genres as $genre)
                    <?php $genre_list .= $genre->name.", "; ?>
                @endforeach
                <input type="input" class="form-control" id="genre" name="genre" value="{{Input::old('genre',$genre_list)}}">
                
                
                @if($errors->has('genre'))
                <p class="help-block">{{$errors->first('genre')}}</p>
                @endif
            </div>
            <button type="submit" class="btn btn-info">Submit</button>
        </form>
    </div>
</div>

@stop