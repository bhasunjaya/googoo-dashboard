@extends('master')

@section('css')
@stop

@section('javascripts')
@stop

@section('content')
<h3>Ruang Siar</h3>
<hr/>
<div class="row">
    <div class="col-xs-4">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Artists</div>
            <div class="panel-body">
                <p>Some default panel content here. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </div>

            <!-- List group -->
            <ul class="list-group">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Songs Found</div>

            <!-- List group -->
            <ul class="list-group">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>
    </div>

    <div class="col-xs-4">
        <div class="panel panel-default">
            <div class="panel-heading">Songs Found</div>

            <!-- List group -->
            <ul class="list-group">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>
    </div>

    <div class="col-xs-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                Programs
                <div class="pull-right">
                    <a href="#" class="btn btn-xs btn-info">
                        <span class="glyphicon glyphicon-transfer"></span> 
                        change
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <h3>Santai Siang</h3>
                <p>BPM : 29 - 30</p>
            </div>
        </div>
    </div>
</div>

@stop