@extends('admin.admin')
@section('admin-content')
    @include('admin.cms_admin_content_top')
    <div class="col-xs-12 users-content padding_fix">
        <div class="col-xs-12 padding_fix cms-headings text-center" style="border-bottom: 1px solid #222; height: 30px;">
            <span style="color: white; line-height: 30px; font-size: 18px;">{{ $user->username }}</span>
        </div>
    </div>
    <div class="col-xs-12" style="border: 1px solid black; border-top: 0px; padding-bottom: 30px;">
        <div class="col-md-4">
            <div class="col-md-12" style="margin-top: 25px; margin-bottom: 25px; padding: 15px; border: 1px solid black;">
                <div class="col-md-12 padding_fix text-left" style="padding-bottom: 10px;">
                    <span style="font-size: 20px; font-weight: 600;">
                        User information
                    </span>
                </div>
                <div class="col-md-6 padding_fix">
                    Username
                </div>
                <div class="col-md-6 padding_fix">
                    {{ $user->username }}
                </div>
                <hr class="col-md-12 padding_fix custom-line">
                <div class="col-md-6 padding_fix">
                    Email
                </div>
                <div class="col-md-6 padding_fix">
                    {{ $user->email }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="col-md-12" style="margin-top: 25px; padding: 15px; border: 1px solid black;">
                <div class="col-md-12 padding_fix text-left" style="padding-bottom: 10px;">
                    <span style="font-size: 20px; font-weight: 600;">
                        User roles
                    </span>
                    @if(isset($roles) && !is_null($roles) && count($roles) > 0)
                        <span id="assign_role" style="font-size: 20px; font-weight: 600; float: right; cursor: pointer;">
                            <i class="fa fa-plus-square" style="font-size: 24px; color: lightgreen;"></i>
                        </span>
                    @endif
                </div>
                @foreach($user->roles as $ur)
                    <div class="col-md-11 padding_fix">
                        {{ $ur->title }}
                    </div>
                    @if(count($user->roles) > '1')
                        <div class="col-md-1 padding_fix">
                            {!! Form::open(['method' => 'POST', 'route' => ['remove_role', $user, $ur->name ]]) !!}
                            {!! Form::token() !!}
                            <button type="submit" style="background: transparent; border: none;">
                                <i class="fa fa-times" style="font-size: 16px; color: red;"></i>
                            </button>
                            {!! Form::close() !!}
                        </div>
                    @endif
                    <hr class="col-md-12 padding_fix custom-line">
                @endforeach
            </div>
            @if(isset($roles) && !is_null($roles) && count($roles) > 0)
                <div id="assign_role_div" class="col-md-12" style="border: 1px solid black; border-top: 0px;" hidden>
                    {!! Form::open(array('route' => 'assign_new_role','method' => 'POST')) !!}
                    {!! Form::token() !!}
                    {!! Form::hidden('user_id',$user->id) !!}
                    <div class="col-md-12" style="padding: 10px 0px;">
                        <div class="col-md-6 text-center">
                            <span style="">Pick a role to assign</span>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" name="new_role_select">
                                @foreach($roles as $r)
                                    <option value="{{$r->name}}">{{$r->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 text-center">
                            {!! Form::submit('Assign new role',['class' => 'btn btn-new', 'style' => 'text-center']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            @else
                <div class="col-md-12 text-center" style="border: 1px solid black; border-top: 0px; padding: 5px;">
                    <span>You can't assign new roles to this user</span>
                </div>
            @endif
        </div>
        <div class="col-md-4">
            <div class="col-md-12" style="margin-top: 25px; margin-bottom: 25px; padding: 15px; border: 1px solid black;">
                <div class="col-md-12 padding_fix text-left" style="padding-bottom: 10px;">
                    <span style="font-size: 20px; font-weight: 600;">
                        User permissions
                    </span>
                </div>
                @foreach($user_abilities as $ua)
                    <div class="col-md-12 padding_fix">
                        {{ $ua->title }}
                    </div>
                    <hr class="col-md-12 padding_fix custom-line">
                @endforeach
            </div>
        </div>
    </div>
@stop
@section('admin-scripts')
    <script type="text/javascript">
        $(document).ready( function() {
            $("#assign_role").on('click', function() {
                $("#assign_role_div").slideToggle("slow");
            });
        });
    </script>
@stop