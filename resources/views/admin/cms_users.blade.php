@extends('admin.admin')
@section('admin-content')
    @include('admin.cms_admin_content_top')
    <div class="col-xs-12 padding_fix" style="padding-top: 15px; position: relative;">
        <a class="btn btn-new" id="new_user_add" style="float: right;"><i class="fa fa-plus" style="padding-right: 5px;"></i>Add new user</a>
        <div class="col-xs-12 col-sm-4 col-md-2 new_user_div" id="new_user_div">
            {!! Form::open(array('route' => 'users.store')) !!}
            {!! Form::token() !!}
            <div class="form-row">
                <div class="form-group col-md-12">
                    @if ($errors->has('username'))
                        <div class="error" style="color: red; font-size: 12px;">
                            {{ $errors->first('username') }}
                        </div>
                    @endif
                    <label class="new_user_label" for="inputUsername4">Username</label>
                    <input type="text" class="form-control" id="inputUsername4" name="username" placeholder="Username" required>
                </div>
                <div class="form-group col-md-12">
                    @if ($errors->has('email'))
                        <div class="error" style="color: red; font-size: 12px;">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <label class="new_user_label" for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    @if ($errors->has('password'))
                        <div class="error" style="color: red; font-size: 12px;">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                    <label class="new_user_label" for="inputPass4">Password</label>
                    <input type="password" class="form-control" id="inputPass4" name="password" placeholder="Password" required>
                </div>
                <div class="form-group col-md-12">
                    @if ($errors->has('password_confirmation'))
                        <div class="error" style="color: red; font-size: 12px;">
                            {{ $errors->first('password_confirmation') }}
                        </div>
                    @endif
                    <label class="new_user_label" for="inputPassConf4">Confirm password</label>
                    <input type="password" class="form-control" id="inputPassConf4" name="password_confirmation" placeholder="Confirm password" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-xs-12 text-center">
                    <button class="btn btn-new" type="submit" value="Create new user">Create new user</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-xs-12 users-content padding_fix">
        <div class="col-xs-12 padding_fix cms-headings" style="border-bottom: 1px solid #222; height: 30px;">
            <div class="col-xs-12 col-sm-12 col-md-2 text-center" style="color: white; line-height: 30px;">
                <span>Username</span>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-2 text-center" style="color: white; line-height: 30px;">
                <span>Email</span>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 text-center" style="color: white; line-height: 30px;">
                <span>Active</span>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 text-center" style="color: white; line-height: 30px;">
                <span>Super admin</span>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 text-center" style="color: white; line-height: 30px;">
                <span>Registered on</span>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 text-center" style="color: white; line-height: 30px;">
                <span>Edit</span>
            </div>
        </div>
        @if(count($users) > 0)
            <div class="users_list">
                @include('admin.partials.cms_user_listing')
            </div>
        @else
            <div class="col-xs-12 padding_fix text-center" style="color: white; padding-top: 10px; padding-bottom: 10px;">
                There are no users to display
            </div>
        @endif
    </div>
@stop
@section('admin-scripts')
<script type="text/javascript">

    $('.is-active').click( function() {
        var id = $(this).attr('id');

        $.ajax({
            type: 'POST',
            url: 'change_active_user',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": this.id
            },
            success: function(data){
            }
        });
    });

    $('.is-admin').click( function() {
        var id = $(this).attr('id');

        $.ajax({
            type: 'POST',
            url: 'change_admin_user',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id
            },
            success: function(data){
            }
        });
    });

    $(function() {
        $('body').on('click', '.pagination a', function(e) {
            e.preventDefault();

            $('.users_list a').css('color', '#1eb91e');

            var url = $(this).attr('href');
            getUsers(url);
            window.history.pushState("", "", url); // sets url to current pagination href
        });

        function getUsers(url) {
            $.ajax({
                url : url
            }).done(function (data) {
                $('.users_list').html(data);
            }).fail(function () {
                alert('Users could not be loaded.');
            });
        }
    });

    $(document).ready( function() {
        $('#new_user_add').click( function() {
           $('#new_user_div').toggle("fast");
        });
    })

</script>
@stop