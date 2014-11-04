@extends('master')

@section('css')
@stop

@section('javascripts')
@stop

@section('content')
<h3>Lagu  Database</h3>
<div class="row">

    

    <div class="col-xs-3">
        <a href="{{URL::to('song/preimport')}}" class="btn btn-block btn-info">import new songs</a>
    </div>
</div>

@stop