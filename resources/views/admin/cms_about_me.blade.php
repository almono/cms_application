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
    <div class="col-xs-12 col-sm-12 padding_fix">
        <div class="col-xs-12 col-sm-6">
            <div class="col-xs-12 padding_fix cms-headings" style="height: 30px; margin-bottom: 5px">
                <div class="col-xs-12 text-left" style="border-bottom: 1px solid black; color: white; line-height: 30px;">
                    <h4 style="font-weight: 600;">Main information</h4>
                </div>
            </div>
            <div class="col-xs-12" id="main_list" style="padding: 15px; margin-bottom: 20px;">
                @if(isset($info->main) && !is_null($info->main))
                    <?php $main_field = 1; ?>
                    @foreach($info->main as $main)
                        <div class="col-xs-12 text-center main_field" id="main_inputs{{ $main_field }}">
                            <h4 class="col-xs-12 text-center">Main field {{ $main_field }}</h4>
                            <button type="button" class="btn btn-new" id="add_values_main" name="main_inputs{{ $main_field }}" value="main">Add new values</button>
                            <i class="fa fa-times input-remover" id="field_remover"></i>
                            @foreach($main as $key => $value)
                                <div class="col-xs-12 padding_fix about-div text-center" id="main_{{ $main_field }}">
                                    <input class="dark-input" type="text" name="main[main_inputs{{$main_field}}][keys][]" value="{{ $key }}">
                                    <input class="dark-input" type="text" name="main[main_inputs{{$main_field}}][values][]" value="{{ $value }}">
                                    <i class="fa fa-times input-remover" id="input_remover"></i>
                                </div>
                            @endforeach
                        </div>
                        <?php $main_field += 1; ?>
                    @endforeach
                @endif
            </div>
            <button type="button" class="btn btn-new" id="add_new_main" name="main" value="{{ $main_field }}" style="float: right; margin-top: 10px;">Add new field</button>
        </div>

        <div class="col-xs-12 col-sm-6">
            <div class="col-xs-12 padding_fix cms-headings" style="height: 30px; margin-bottom: 5px">
                <div class="col-xs-12 text-left" style="border-bottom: 1px solid black; color: white; line-height: 30px;">
                    <h4 style="font-weight: 600;">Education information</h4>
                </div>
            </div>
            <div class="col-xs-12" id="education_list" style="padding: 15px; margin-bottom: 20px;">
                @if(isset($info->education) && !is_null($info->education))
                    <?php $education_field = 1; ?>
                    @foreach($info->education as $edu)
                        <div class="col-xs-12 text-center education_field" id="education_inputs{{ $education_field }}">
                            <h4 class="col-xs-12 text-center">Education field {{ $education_field }}</h4>
                            <button type="button" class="btn btn-new" id="add_values_education" name="education_inputs{{ $education_field }}" value="education">Add new values</button>
                            <i class="fa fa-times input-remover" id="field_remover"></i>
                            @foreach($edu as $key => $value)
                                <div class="col-xs-12 padding_fix about-div text-center" id="education_{{ $education_field }}">
                                    <input class="dark-input" type="text" name="education[education_inputs{{$education_field}}][keys][]" value="{{ $key }}">
                                    <input class="dark-input" type="text" name="education[education_inputs{{$education_field}}][values][]" value="{{ $value }}">
                                    <i class="fa fa-times input-remover" id="input_remover"></i>
                                </div>
                            @endforeach
                        </div>
                        <?php $education_field += 1; ?>
                    @endforeach
                @endif
            </div>
            <button type="button" class="btn btn-new" id="add_new_education" name="education" value="{{ $education_field }}" style="float: right; margin-top: 10px;">Add new field</button>
        </div>

        <div class="col-xs-12 col-sm-6">
            <div class="col-xs-12 padding_fix cms-headings" style="height: 30px; margin-bottom: 5px">
                <div class="col-xs-12 text-left" style="border-bottom: 1px solid black; color: white; line-height: 30px;">
                    <h4 style="font-weight: 600;">Experience information</h4>
                </div>
            </div>
            <div class="col-xs-12" id="experience_list" style="padding: 15px; margin-bottom: 20px;">
                @if(isset($info->experience) && !is_null($info->experience))
                    <?php $experience_field = 1; ?>
                    @foreach($info->experience as $edu)
                        <div class="col-xs-12 text-center experience_field" id="experience_inputs{{ $experience_field }}">
                            <h4 class="col-xs-12 text-center">Experience field {{ $experience_field }}</h4>
                            <button type="button" class="btn btn-new" id="add_values_experience" name="experience_inputs{{ $experience_field }}" value="experience">Add new values</button>
                            <i class="fa fa-times input-remover" id="field_remover"></i>
                            @foreach($edu as $key => $value)
                                <div class="col-xs-12 padding_fix about-div text-center" id="experience_{{ $experience_field }}">
                                    <input class="dark-input" type="text" name="experience[experience_inputs{{$experience_field}}][keys][]" value="{{ $key }}">
                                    <input class="dark-input" type="text" name="experience[experience_inputs{{$experience_field}}][values][]" value="{{ $value }}">
                                    <i class="fa fa-times input-remover" id="input_remover"></i>
                                </div>
                            @endforeach
                        </div>
                        <?php $experience_field += 1; ?>
                    @endforeach
                @endif
            </div>
            <button type="button" class="btn btn-new" id="add_new_experience" name="experience" value="{{ $experience_field }}" style="float: right;  margin-top: 10px;">Add new field</button>
        </div>

        <div class="col-xs-12 col-sm-6">
            <div class="col-xs-12 padding_fix cms-headings" style="height: 30px; margin-bottom: 5px">
                <div class="col-xs-12 text-left" style="border-bottom: 1px solid black; color: white; line-height: 30px;">
                    <h4 style="font-weight: 600;">Skills information</h4>
                </div>
            </div>
            <div class="col-xs-12" id="skills_list" style="padding: 15px; margin-bottom: 20px;">
                @if(isset($info->skills) && !is_null($info->skills))
                    <?php $skills_field = 1; ?>
                    @foreach($info->skills as $edu)
                        <div class="col-xs-12 text-center skills_field" id="skills_inputs{{ $skills_field }}">
                            <h4 class="col-xs-12 text-center">Skills field {{ $skills_field }}</h4>
                            <button type="button" class="btn btn-new" id="add_values_skills" name="skills_inputs{{ $skills_field }}" value="skills">Add new values</button>
                            <i class="fa fa-times input-remover" id="field_remover"></i>
                            @foreach($edu as $key => $value)
                                <div class="col-xs-12 padding_fix about-div text-center" id="skills_{{ $skills_field }}">
                                    <input class="dark-input" type="text" name="skills[skills_inputs{{$skills_field}}][keys][]" value="{{ $key }}">
                                    <input class="dark-input" type="text" name="skills[skills_inputs{{$skills_field}}][values][]" value="{{ $value }}">
                                    <i class="fa fa-times input-remover" id="input_remover"></i>
                                </div>
                            @endforeach
                        </div>
                        <?php $skills_field += 1; ?>
                    @endforeach
                @endif
            </div>
            <button type="button" class="btn btn-new" id="add_new_skills" name="skills" value="{{ $skills_field }}" style="float: right; margin-top: 10px;">Add new field</button>
        </div>

       <div class="col-xs-12 col-sm-6">
           <div class="col-xs-12 padding_fix cms-headings" style="height: 30px; margin-bottom: 5px">
               <div class="col-xs-12 text-left" style="border-bottom: 1px solid black; color: white; line-height: 30px;">
                   <h4 style="font-weight: 600;">Interests information</h4>
               </div>
           </div>
           <div class="col-xs-12" id="interests_list" style="padding: 15px; margin-bottom: 20px;">
               @if(isset($info->interests) && !is_null($info->interests))
                   <?php $interests_field = 1; ?>
                   @foreach($info->interests as $edu)
                       <div class="col-xs-12 text-center interests_field" id="interests_inputs{{ $interests_field }}">
                           <h4 class="col-xs-12 text-center">Interests field {{ $interests_field }}</h4>
                           <button type="button" class="btn btn-new" id="add_values_interests" name="interests_inputs{{ $interests_field }}" value="interests">Add new values</button>
                           <i class="fa fa-times input-remover" id="field_remover"></i>
                           @foreach($edu as $key => $value)
                               <div class="col-xs-12 padding_fix about-div text-center" id="interests_{{ $interests_field }}">
                                   <input class="dark-input" type="text" name="interests[interests_inputs{{$interests_field}}][keys][]" value="{{ $key }}">
                                   <input class="dark-input" type="text" name="interests[interests_inputs{{$interests_field}}][values][]" value="{{ $value }}">
                                   <i class="fa fa-times input-remover" id="input_remover"></i>
                               </div>
                           @endforeach
                       </div>
                       <?php $interests_field += 1; ?>
                   @endforeach
               @endif
           </div>
           <button type="button" class="btn btn-new" id="add_new_interests" name="interests" value="{{ $interests_field }}" style="float: right; margin-top: 10px;">Add new field</button>
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
            $(document).on('click',"button[id ^= 'add_values']", function(event) {
                // get name attribute of clicked tag
                var clicked_field = this.name;
                var clicked_name = this.value;
                var clicked_value = $(this).prop('value');
                $("#" + clicked_field).append('<div class="col-xs-12 padding_fix about-div text-center" id="' + clicked_field + '_' + clicked_value + '">'+
                    '                                <input class="dark-input" type="text" name="' + clicked_name + '[' + clicked_field + '][keys][]" value="New key">'+
                    '                                <input class="dark-input" type="text" name="' + clicked_name + '[' + clicked_field + '][values][]" value="New value">'+
                    '                                <i class="fa fa-times input-remover" id="input_remover"></i>'+
                    '                            </div>');
            });

            $(document).on('click',"button[id ^= 'add_new']", function(event) {
                var clicked_field = this.name; //main
                var clicked_value = $(this).prop('value'); //2
                this.value = parseInt($(this).prop('value')) + 1;
                $("#" + clicked_field + "_list").append('<div class="col-xs-12 text-center ' + clicked_field + '_field" id="' + clicked_field + '_inputs' + clicked_value + '">'+
                    '                        <h4 class="col-xs-12 text-center">' + clicked_field + ' field ' + clicked_value + '</h4>'+
                    '                        <button type="button" class="btn btn-new" id="add_values_' + clicked_field + '" name="' + clicked_field + '_inputs' + clicked_value + '" value="' + clicked_field + '">Add new values</button>'+
                    '                        <i class="fa fa-times input-remover" id="field_remover"></i></div>');
            });



            $(document).on('click', '#field_remover', function() {
               $(this).parent().remove();
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