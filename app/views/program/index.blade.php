@extends('master')

@section('css')
@stop

@section('javascripts')
@stop

@section('content')
<h3>Program</h3>
<div class="row">

    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{URL::to('program/create')}}" class="btn btn-xs btn-info">add program</a>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th class="col-xs-2">BPM</th>
                        <th class="col-xs-2">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($programs as $program)
                    <tr>
                        <td>{{$program->name}}</td>
                        <td>{{$program->min_bpm}} - {{$program->max_bpm}}</td>
                        <td>
                            <a href="{{URL::to('program/'.$program->id.'/edit')}}" class="btn btn-info btn-xs">edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{$programs->links()}}
    </div>
</div>

@stop