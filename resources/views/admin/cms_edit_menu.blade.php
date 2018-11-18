@extends('admin.admin')
@section('admin-content')
    @include('admin.cms_admin_content_top')
    <div class="col-xs-12 users-content">
        <div class="row">
            <div class="col-xs-12" style="padding: 20px 15px;">
                <span style="font-size: 30px; font-weight: 600;">Edit menu item</span>
            </div>
            <div class="col-xs-12" style="padding-top: 20px;">
                {!! Form::open(array('route' => [ 'menu.update', $menu ], 'files' => 'true', 'method' => 'PUT' )) !!}
                {!! Form::token() !!}
                <div class="form-row col-xs-12 col-sm-3 col-md-3 padding_fix">
                    <div class="form-group col-xs-12 col-sm-12" style="padding-top: 10px;">
                        <div class="col-xs-12 col-sm-12 padding_fix" style="margin-bottom: 20px;">
                            @if ($errors->has('title'))
                                <div class="error" style="color: red; font-size: 12px;">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <div class="col-xs-4 text-right border-right-1">
                                <label class="new_user_label" for="inputTitle4">Title</label>
                            </div>
                            <div class="col-xs-8 text-left">
                                <div>{{ $menu->menu_name }}</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 padding_fix" style="margin-bottom: 20px;">
                            <div class="col-xs-4 text-right border-right-1">
                                <label class="new_user_label" for="inputSeo4">URL</label>
                            </div>
                            <div class="col-xs-8 text-left">
                                <div>{{ $menu->menu_url }}</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 padding_fix" style="margin-bottom: 20px;">
                            <div class="col-xs-4 text-right border-right-1">
                                <label class="new_user_label" for="inputSeo4">Order</label>
                            </div>
                            <div class="col-xs-8 text-left">
                                <div>{{ $menu->order }}</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 padding_fix" style="margin-bottom: 20px;">
                            <div class="col-xs-4 text-right border-right-1">
                                <label class="new_user_label" for="inputSeo4">Parent item</label>
                            </div>
                            <div class="col-xs-8 text-left">
                                @if(isset($menu->parent) && !is_null($menu->parent))
                                    <div>{{ $menu->parent->menu_name }}</div>
                                @else
                                    <div>No parent assigned</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row col-xs-12 col-sm-8 col-md-8 padding_fix">
                    <div class="form-group col-xs-12 col-sm-12" style="padding-top: 10px;">
                        <div class="col-xs-12 col-sm-12 flex_display padding_fix" style="margin-bottom: 10px;">
                            @if ($errors->has('new_name'))
                                <div class="error" style="color: red; font-size: 12px;">
                                    {{ $errors->first('new_name') }}
                                </div>
                            @endif
                            <div class="col-xs-2 padding_fix text-center">
                                <label class="new_user_label" for="inputTitle4">New Title</label>
                            </div>
                            <div class="col-xs-10">
                                <input type="text" class="form-control" id="inputTitle4" name="new_name" placeholder="{{ $menu->menu_name }}" style="max-width: 200px;">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 flex_display padding_fix" style="margin-bottom: 10px;">
                            @if ($errors->has('new_url'))
                                <div class="error" style="color: red; font-size: 12px;">
                                    {{ $errors->first('new_url') }}
                                </div>
                            @endif
                            <div class="col-xs-2 padding_fix text-center">
                                <label class="new_user_label" for="inputURL4">New URL</label>
                            </div>
                            <div class="col-xs-10">
                                <input type="text" class="form-control" id="inputTitle4" name="new_url" placeholder="{{ $menu->menu_url }}" style="max-width: 200px;">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 flex_display padding_fix" style="margin-bottom: 10px;">
                            @if ($errors->has('new_order'))
                                <div class="error" style="color: red; font-size: 12px;">
                                    {{ $errors->first('new_order') }}
                                </div>
                            @endif
                            <div class="col-xs-2 padding_fix text-center">
                                <label class="new_user_label" for="inputOrder4">New Order</label>
                            </div>
                            <div class="col-xs-10">
                                <input type="number" class="form-control" id="inputTitle4" name="new_order" placeholder="{{ $menu->order }}" min="0" style="max-width: 200px;">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 flex_display padding_fix">
                            <div class="col-xs-2 padding_fix text-center">
                                <label class="new_user_label" for="inputParentName">Parent menu</label>
                            </div>
                            <div class="col-xs-10">
                                <select class="form-control" name="menu_parent" style="max-width: 200px;">
                                    <option value="" @if($menu->parent_id == 0) selected @endif>No parent</option>
                                    @foreach($menu_main as $mm)
                                        <option value="{{$mm->id}}" @if($menu->parent_id == $mm->id) selected @endif>{{ $mm->menu_name }}</option>
                                    @endforeach
                                </select>
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