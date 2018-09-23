@extends('admin.admin')
@section('admin-content')
    @include('admin.cms_admin_content_top')
    <div class="col-xs-12 users-content padding_fix">
        <div class="col-xs-12 padding_fix cms-headings text-center" style="border-bottom: 1px solid #222; height: 30px;">
            <span style="color: white; line-height: 30px; font-size: 18px;">{{ $role->title }}</span>
        </div>
    </div>
    <div class="col-xs-12" style="border: 1px solid black; border-top: 0px; padding-bottom: 30px;">
        <div class="col-md-4">
            <div class="col-md-12" style="margin-top: 25px; margin-bottom: 25px; padding: 15px; border: 1px solid black;">
                <div class="col-md-12 padding_fix text-left" style="padding-bottom: 10px;">
                    <span style="font-size: 20px; font-weight: 600;">
                        Role information
                    </span>
                </div>
                <div class="col-md-6 padding_fix">
                    Title
                </div>
                <div class="col-md-6 padding_fix">
                    {{ $role->title }}
                </div>
                <hr class="col-md-12 padding_fix custom-line">
                <div class="col-md-6 padding_fix">
                    Level
                </div>
                <div class="col-md-6 padding_fix">
                    @if(isset($role->level) && $role->level != '')
                        {{ $role->level }}
                    @else
                        Undefined
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="col-md-12" style="margin-top: 25px; margin-bottom: 0px; padding: 15px; border: 1px solid black;">
                <div class="col-md-12 padding_fix text-left" style="padding-bottom: 10px;">
                    <span style="font-size: 20px; font-weight: 600;">
                        Role abilities
                    </span>
                    @if(isset($abilities) && !is_null($abilities) && count($abilities) > 0)
                        <span id="assign_ability" style="font-size: 20px; font-weight: 600; float: right; cursor: pointer;">
                            <i class="fa fa-plus-square" style="font-size: 24px; color: lightgreen;"></i>
                        </span>
                    @endif
                </div>
                @foreach($role->role_abilities as $ra)
                    <div class="col-md-11 padding_fix">
                        {{ $ra->title }}
                    </div>
                    <div class="col-md-1 padding_fix">
                        {!! Form::open(['method' => 'POST', 'route' => ['remove_ability', $role->name, $ra->id ]]) !!}
                        <button type="submit" style="background: transparent; border: none;">
                            <i class="fa fa-times" style="font-size: 16px; color: red;"></i>
                        </button>
                        {!! Form::close() !!}
                    </div>
                    <hr class="col-md-12 padding_fix custom-line">
                @endforeach
            </div>
            @if(isset($abilities) && !is_null($abilities) && count($abilities) > 0)
                <div id="assign_ability_div" class="col-md-12" style="border: 1px solid black; border-top: 0px;" hidden>
                    {!! Form::open(array('route' => 'assign_new_ability','method' => 'POST')) !!}
                    {!! Form::token() !!}
                    {!! Form::hidden('role_name',$role->name) !!}
                        <div class="col-md-12" style="padding: 10px 0px;">
                            <div class="col-md-6 text-center">
                                <span style="">Pick an ability to assign</span>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" name="new_ability_select">
                                    @foreach($abilities as $a)
                                        <option value="{{$a->id}}">{{$a->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 text-center">
                                {!! Form::submit('Assign new ability',['class' => 'btn btn-new', 'style' => 'text-center']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            @else
                <div class="col-md-12 text-center" style="border: 1px solid black; border-top: 0px; padding: 5px;">
                    <span>You can't assign new abilities to this role</span>
                </div>
            @endif
        </div>
    </div>
@stop
@section('admin-scripts')
<script type="text/javascript">
    $(document).ready( function() {
       $("#assign_ability").on('click', function() {
           $("#assign_ability_div").slideToggle("slow");
       });
    });
</script>
@stop