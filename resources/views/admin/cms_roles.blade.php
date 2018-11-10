@extends('admin.admin')
@section('admin-content')
    @include('admin.cms_admin_content_top')
    <div class="col-xs-12 padding_fix" style="padding-top: 15px; position: relative;">
        <a class="btn btn-new" id="new_role_add" style="float: right;"><i class="fa fa-plus" style="padding-right: 5px;"></i>Add new role</a>
        <div class="col-xs-12 col-sm-4 col-md-2 new_user_div" id="new_role_div">
            {!! Form::open(array('route' => 'roles.store')) !!}
            {!! Form::token() !!}
            <div class="form-row">
                <div class="form-group col-md-12">
                    @if ($errors->has('name'))
                        <div class="error" style="color: red; font-size: 12px;">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <label class="new_user_label" for="inputRoleName">Role name</label>
                    <input type="text" class="form-control" id="inputRoleName" name="role_name" placeholder="Role name" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-xs-12 text-center">
                    <button class="btn btn-new" type="submit" value="Create new role">Create new role</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-xs-12 users-content padding_fix">
        <div class="col-xs-12 padding_fix cms-headings" style="border-bottom: 1px solid #222; height: 30px;">
            <div class="col-xs-12 col-sm-12 col-md-2 text-center" style="color: white; line-height: 30px;">
                <span>Name</span>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 text-center" style="color: white; line-height: 30px;">
                <span>Active</span>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 text-center" style="color: white; line-height: 30px;">
                <span>Created on</span>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 text-center" style="color: white; line-height: 30px;">
                <span>Edit</span>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 text-center" style="color: white; line-height: 30px;">
                <span>Delete</span>
            </div>
        </div>
        @if(count($roles) > 0)
            <div class="roles_list">
                @include('admin.partials.cms_role_listing')
            </div>
        @else
            <div class="col-xs-12 padding_fix text-center" style="color: white; padding-top: 10px; padding-bottom: 10px;">
                There are no roles to display
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
                url: 'change_active_role',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": this.id
                },
                success: function(data){
                }
            });
        });

        $(document).ready( function() {
            $('#new_role_add').click( function() {
                $('#new_role_div').toggle("fast");
            });
        });

        $(function() {
            $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();

                $('.roles_list a').css('color', '#1eb91e');

                var url = $(this).attr('href');
                getRoles(url);
                window.history.pushState("", "", url); // sets url to current pagination href
            });

            function getRoles(url) {
                $.ajax({
                    url : url
                }).done(function (data) {
                    $('.roles_list').html(data);
                }).fail(function () {
                    alert('Users could not be loaded.');
                });
            }
        });

        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }

    </script>
@stop