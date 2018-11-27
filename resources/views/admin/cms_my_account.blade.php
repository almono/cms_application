@extends('admin.admin')
@section('admin-content')
    @include('admin.cms_admin_content_top')
    <div class="col-xs-12 users-content">
        <div class="row">
            <div class="col-xs-12" style="padding: 20px 15px;">
                <span style="font-size: 30px; font-weight: 600;">My account</span>
            </div>
            <div class="col-xs-12 padding_fix" style="padding-top: 20px;">
                {!! Form::open(array('route' => [ 'users.update', $user ], 'files' => 'true', 'method' => 'PUT' )) !!}
                {!! Form::token() !!}
                <div class="form-row col-xs-12 col-sm-3 col-md-3 padding_fix">
                    <div class="form-group col-xs-12 col-sm-12 padding_fix" style="padding-top: 10px;">
                        <div class="col-xs-12 col-sm-12 padding_fix" style="margin-bottom: 20px;">
                            @if ($errors->has('title'))
                                <div class="error" style="color: red; font-size: 12px;">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <div class="col-xs-5 col-sm-4 text-right border-right-1">
                                <label class="new_user_label" for="inputTitle4">Username</label>
                            </div>
                            <div class="col-xs-7 col-sm-8 text-left">
                                <div>{{ $user->username }}</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 padding_fix" style="margin-bottom: 20px;">
                            <div class="col-xs-5 col-sm-4 text-right border-right-1">
                                <label class="new_user_label" for="inputSeo4">Email</label>
                            </div>
                            <div class="col-xs-7 col-sm-8 text-left">
                                <div>{{ $user->email }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row col-xs-12 col-sm-8 col-md-8 padding_fix">
                    <div class="form-group col-xs-12 col-sm-12" style="padding-top: 10px;">
                        <div class="col-xs-12 col-sm-12 flex_display padding_fix" style="margin-bottom: 10px;">

                        </div>
                    </div>
                </div>
                <div class="form-row col-xs-12 col-sm-8 col-md-8 padding_fix">
                    <div class="form-group col-xs-12 col-sm-12" style="padding-top: 10px;">
                        <div class="col-xs-12 col-sm-12 flex_display padding_fix" style="margin-bottom: 10px;">
                            @if ($errors->has('new_email'))
                                <div class="error" style="color: red; font-size: 12px;">
                                    {{ $errors->first('new_email') }}
                                </div>
                            @endif
                            <div class="col-xs-2 padding_fix text-center">
                                <label class="new_user_label" for="inputEmail4">New email</label>
                            </div>
                            <div class="col-xs-10">
                                <input type="text" class="form-control" id="inputTitle4" name="new_email" placeholder="{{ $user->email }}" style="max-width: 200px;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row col-xs-12 col-sm-12 col-md-5">
                    <div class="form-group col-xs-12 text-center">
                        <button class="btn btn-new" type="submit" value="Update page">Update</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop