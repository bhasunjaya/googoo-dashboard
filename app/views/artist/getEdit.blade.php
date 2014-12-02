@extends('master')

@section('css')
<link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}"/>
@stop

@section('javascripts')
<script type="text/javascript" src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div><input type="text" class="form-control" id="autocomplete" name="similar[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
            }
        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
        
        // setup autocomplete function pulling from currencies[] array
        $('.autocomplete').autocomplete({
            source: "{{URL::to('artist/artistlist')}}",
            minLength: 2,
            select: function(event, data) {
                var hid_class = $(this).attr('id');
                detail = data.item;
                $('.'+hid_class).val(detail.data);
            },
            response: function(event, ui) {
                if (ui.content == null) {
                    var noResult = {value: "No results found", label: "No results found"};
                    ui.content = noResult;
                    console.log(ui);
                }
            }
        });
    });
</script>
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
                <?php $genre_list .= $genre->name . ", "; ?>
                @endforeach
                <input type="input" class="form-control" id="genre" name="genre" value="{{Input::old('genre',$genre_list)}}">
                @if($errors->has('genre'))
                <p class="help-block">{{$errors->first('genre')}}</p>
                @endif
            </div>
            <div class="form-group input_fields_wrap">
                <label class="control-label" for="similar">Similar Artist</label></br>
                <button class="btn btn-primary add_field_button">Add More Similar Artist</button></br></br>
                <div>
                    <input type="text" id="text_1" class="form-control autocomplete" name="sim_name[]"/>
                    <input type="hidden" class="text_1" name="sim_id[]"/>
                </div>
                <div>
                    <input type="text" id="text_2" class="form-control autocomplete" name="sim_name[]" />
                    <input type="hidden" class="text_2" name="sim_id[]"/>
                </div>
                <div>
                    <input type="text" id="text_3" class="form-control autocomplete" name="sim_name[]" />
                    <input type="hidden" class="text_3" name="sim_id[]"/>
                </div>
                <div>
                    <input type="text" id="text_4" class="form-control autocomplete" name="sim_name[]" />
                    <input type="hidden" class="text_4" name="sim_id[]"/>
                </div>
                <div>
                    <input type="text" id="text_5" class="form-control autocomplete" name="sim_name[]"/>
                    <input type="hidden" class="text_5" name="sim_id[]"/>
                </div>
            </div>
            <button type="submit" class="btn btn-info">Submit</button>
        </form>
    </div>
</div>

@stop