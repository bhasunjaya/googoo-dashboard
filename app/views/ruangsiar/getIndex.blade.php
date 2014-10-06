@extends('master')

@section('css')
@stop

@section('javascripts')
@stop

@section('content')
<h3>Ruang Siar</h3>
<hr/>
<div class="row">
    <div class="col-xs-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Crowd Songs 
                <a href="#" class="btn btn-primary btn-xs pull-right" id="btn-reload-crowd">
                    <i class="glyphicon glyphicon-refresh"></i> 
                    <span id="text-reload-crowd">reload</span>
                </a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-xs-4">Artist</th>
                        <th class="col-xs-1">BPM</th>
                        <th>Songs</th>
                    </tr>
                </thead>
                <tbody id="playlist">
                    <tr>
                        <td>
                            <a href="#"><span class="label label-default">2</span></a>
                            &nbsp;&nbsp;&nbsp;&nbsp;Naif
                        </td>
                        <td>
                            <ul class="list-unstyled">
                                <li class="">106</li>
                            </ul>
                        </td>
                        <td>
                            <ul class="list-unstyled">
                                <li class="">Selalu</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="label label-default">1</span>&nbsp;&nbsp;&nbsp;&nbsp;David Gilmour</td>
                        <td>
                            <ul class="list-unstyled">
                                <li class="">92</li>
                                <li class="">83</li>
                                <li class="">76</li>
                                <li class="">79</li>
                                <li class="">84</li>
                            </ul>
                        </td>
                        <td>
                            <ul class="list-unstyled">
                                <li class="">Out Of The Blue</li>
                                <li class="">Take A Breath</li>
                                <li class="">No Way</li>
                                <li class="">This Heaven</li>
                                <li class="">Cruise</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="label label-default">1</span>&nbsp;&nbsp;&nbsp;&nbsp;Lady Gaga</td>
                        <td>
                            <ul class="list-unstyled">
                                <li class="">79</li>
                                <li class="">99</li>
                                <li class="">94</li>
                                <li class="">107</li>
                                <li class="">85</li>
                            </ul>
                        </td>
                        <td>
                            <ul class="list-unstyled">
                                <li class="">Bad Kids</li>
                                <li class="">Paper Gangsta</li>
                                <li class="">Eh, Eh (Nothing Else I Can Say)</li>
                                <li class="">Retro, Dance, Freak</li>
                                <li class="">Americano</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="label label-default">1</span>&nbsp;&nbsp;&nbsp;&nbsp;Boyce Avenue</td>
                        <td>
                            <ul class="list-unstyled">
                                <li class="">93</li>
                                <li class="">91</li>
                                <li class="">87</li>
                                <li class="">86</li>
                                <li class="">108</li>
                            </ul>
                        </td>
                        <td>
                            <ul class="list-unstyled">
                                <li class="">Hate That I Love You (Rihanna Cover)</li>
                                <li class="">Sweetest Girl (Dollar Bill) (Wyclef Jean Cover)</li>
                                <li class="">With You (Chris Brown Cover)</li>
                                <li class="">Before It's Too Late (Goo Goo Dolls Cover)</li>
                                <li class="">Keep Holding On (Avril Lavigne Cover)</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="label label-default">1</span>&nbsp;&nbsp;&nbsp;&nbsp;Janis Joplin</td>
                        <td>
                            <ul class="list-unstyled">
                                <li class="">110</li>
                                <li class="">109</li>
                                <li class="">80</li>
                                <li class="">82</li>
                                <li class="">109</li>
                            </ul>
                        </td>
                        <td>
                            <ul class="list-unstyled">
                                <li class="">Try (Just A Little Bit Harder)</li>
                                <li class="">Ball And Chain</li>
                                <li class="">Piece Of My Heart</li>
                                <li class="">Bye, Bye Baby</li>
                                <li class="">Maybe</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="label label-default">1</span>&nbsp;&nbsp;&nbsp;&nbsp;thedyingsirens</td>
                        <td>
                            <ul class="list-unstyled">
                                <li class="">80</li>
                                <li class="">99</li>
                                <li class="">107</li>
                                <li class="">87</li>
                                <li class="">83</li>
                            </ul>
                        </td>
                        <td>
                            <ul class="list-unstyled">
                                <li class="">Thedyingsirens</li>
                                <li class="">Byebye</li>
                                <li class="">Happiness Is A Hoax</li>
                                <li class="">#99</li>
                                <li class="">Be With You (Re-Recorded Version)</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="label label-default">1</span>&nbsp;&nbsp;&nbsp;&nbsp;Sigur Rós</td>
                        <td>
                            <ul class="list-unstyled">
                                <li class="">85</li>
                            </ul>
                        </td>
                        <td>
                            <ul class="list-unstyled">
                                <li class="">Svo Hlj￳tt</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="label label-default">1</span>&nbsp;&nbsp;&nbsp;&nbsp;Pearl Jam</td>
                        <td>
                            <ul class="list-unstyled">
                                <li class="">101</li>
                                <li class="">102</li>
                                <li class="">101</li>
                                <li class="">95</li>
                                <li class="">84</li>
                            </ul>
                        </td>
                        <td>
                            <ul class="list-unstyled">
                                <li class="">Alive (Original)</li>
                                <li class="">Light Years</li>
                                <li class="">The Fixer</li>
                                <li class="">Nothing As It Seems</li>
                                <li class="">Better Man</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="label label-default">1</span>&nbsp;&nbsp;&nbsp;&nbsp;Coldplay</td>
                        <td>
                            <ul class="list-unstyled">
                                <li class="">108</li>
                                <li class="">108</li>
                                <li class="">99</li>
                                <li class="">93</li>
                                <li class="">76</li>
                            </ul>
                        </td>
                        <td>
                            <ul class="list-unstyled">
                                <li class="">Us Against The World</li>
                                <li class="">Parachutes</li>
                                <li class="">For You</li>
                                <li class="">Major Minus</li>
                                <li class="">U.F.O.</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="label label-default">1</span>&nbsp;&nbsp;&nbsp;&nbsp;Bjork</td>
                        <td>
                            <ul class="list-unstyled">
                                <li class="">96</li>
                                <li class="">79</li>
                                <li class="">78</li>
                                <li class="">109</li>
                                <li class="">110</li>
                            </ul>
                        </td>
                        <td>
                            <ul class="list-unstyled">
                                <li class="">Sun In My Mouth</li>
                                <li class="">It's Not Up To You</li>
                                <li class="">Virus</li>
                                <li class="">Dark Matter</li>
                                <li class="">Thunderbolt</li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                Programs
                <div class="pull-right action-buttons">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-cog" style="margin-right: 0px;"></span> change
                        </button>
                        <ul class="dropdown-menu slidedown">
                            @foreach($programs as $p)
                            <li><a href="#">{{$p->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div id="program-current">
                    <h4>Selamat Datang 10-12</h4>
                    <p>BPM 100-120</p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">connected users</div>
        </div>


        <div class="panel panel-default">
            <div class="panel-heading">All Music Interest</div>
        </div>


    </div>
</div>

@stop