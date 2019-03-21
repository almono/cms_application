@extends('admin.admin')
@section('admin-content')
    @include('admin.cms_admin_content_top')
    {!! Form::open(array('route' => [ 'about_me.update', $info ], 'method' => 'PUT' )) !!}
    {!! Form::token() !!}
    <div class="col-xs-12 padding_fix" style="padding-top: 15px; position: relative;">
        <div class="col-xs-12 padding_fix cms-headings" style="height: 30px;">
            <div class="col-xs-12 text-center" style="border: 1px solid black; color: white; line-height: 30px;">
                <span>Main description</span>
            </div>
        </div>
        <div class="col-xs-12" style="padding: 15px;">
            <textarea class="col-xs-12 col-sm-offset-1 col-sm-10 about_me_desc text-center" name="about_me_desc" style="background-color: #464646; padding: 15px;">{{ $info->description }}</textarea>
            <div class="col-xs-12 text-center" style="margin-top: 10px;">
                <button id="edit" class="btn btn-new" type="button">Edit</button>
                <button id="save" class="btn btn-new" type="button">Save</button>
            </div>
        </div>

    </div>
    <div class="col-xs-12 col-sm-offset-3 col-sm-6 padding_fix">
        <div class="col-xs-12 padding_fix cms-headings" style="height: 30px; margin-bottom: 5px">
            <div class="col-xs-12 text-left" style="border-bottom: 1px solid black; color: white; line-height: 30px;">
                <span>Main information</span>
                <button type="button" class="btn btn-new" id="add_new_main" name="main" style="float: right; border: 2px solid black; margin-bottom: 1px; border-bottom: 0px;">Add new</button>
            </div>
        </div>
        <div class="col-xs-12" id="main_list" style="padding: 15px; border-bottom: 1px solid black; margin-bottom: 20px;">
            @if(isset($info->main) && !is_null($info->main))
                @foreach($info->main as $key => $value)
                    <div class="col-xs-12 padding_fix about-div text-center">
                        <input class="dark-input" type="text" name="main[key][]" value="{{ $key }}">
                        <input class="dark-input" type="text" name="main[value][]" value="{{ $value }}">
                        <i class="fa fa-times input-remover" id="input_remover"></i>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-xs-12 padding_fix cms-headings" style="height: 30px; margin-bottom: 5px">
            <div class="col-xs-12 text-left" style="border-bottom: 1px solid black; color: white; line-height: 30px;">
                <span>Education</span>
                <button type="button" class="btn btn-new" id="add_new_education" name="education" style="float: right; border: 2px solid black; margin-bottom: 1px; border-bottom: 0px;">Add new</button>
            </div>
        </div>
        <div class="col-xs-12" id="education_list" style="padding: 15px; border-bottom: 1px solid black;">
            @if(isset($info->education) && !is_null($info->education))
                @foreach($info->education as $key => $value)
                    <div class="col-xs-12 padding_fix about-div text-center">
                        <input class="dark-input" type="text" name="education[key][]" value="{{ $key }}">
                        <input class="dark-input" type="text" name="education[value][]" value="{{ $value }}">
                        <i class="fa fa-times input-remover" id="input_remover"></i>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-xs-12 text-center" style="margin-top: 15px;">
            <input type="submit" class="btn btn-new" value="Update">
        </div>
    </div>
    {!! Form::close() !!}
@stop
@section('admin-scripts')
    <script type="text/javascript">

        $(document).ready( function() {

            // id starts with add_new
            $("button[id ^= 'add_new']").on('click', function(event) {
                // get name attribute of clicked tag
                var clicked_name = event.delegateTarget.name;
                $("#" + clicked_name + "_list").append("<div class=\"col-xs-12 padding_fix about-div text-center\" id=" + clicked_name + "_list\">\n" +
                    "                        <input class=\"dark-input\" type=\"text\" name=" + clicked_name + "[key][]\">\n" +
                    "                        <input class=\"dark-input\" type=\"text\" name=" + clicked_name + "[value][]\">\n" +
                    "                        <i class=\"fa fa-times input-remover\" id=\"input_remover\"></i>\n "+
                    "                    </div>");
            });

            $(document).on('click', '#input_remover' ,function() {
               $(this).parent().remove();
            });

            $('#edit').on('click', function() {
                $('.about_me_desc').summernote({focus: true});
            });

            $("#save").on('click', function() {
                var markup = $('.about_me_desc').summernote('code');
                $('.about_me_desc').summernote('destroy');
            });
        });
    </script>
@stop