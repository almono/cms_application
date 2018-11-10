@extends('admin.admin')
@section('admin-content')
    @include('admin.cms_admin_content_top')
    <div class="col-xs-12 padding_fix" style="padding-top: 15px; position: relative;">
        <a class="btn btn-new" id="new_menu_add" style="float: right;"><i class="fa fa-plus" style="padding-right: 5px;"></i>Add new menu item</a>
        <div class="col-xs-12 col-sm-4 col-md-2 new_user_div" id="new_menu_div">
            {!! Form::open(array('route' => 'menu.store')) !!}
            {!! Form::token() !!}
            <div class="form-row">
                <div class="form-group col-md-12">
                    @if ($errors->has('menu_name'))
                        <div class="error" style="color: red; font-size: 12px;">
                            {{ $errors->first('menu_name') }}
                        </div>
                    @endif
                    <label class="new_user_label" for="inputMenuName">Menu name</label>
                    <input type="text" class="form-control" id="inputMenuName" name="menu_name" placeholder="Menu name" required>
                </div>
                <div class="form-group col-md-12">
                    <label class="new_user_label" for="inputCategoryName">Parent menu</label>
                    <select class="form-control" name="menu_parent">
                        <option value="" selected>No parent</option>
                        @foreach($menu_main as $m)
                            <option value="{{$m->id}}">{{ $m->menu_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-12">
                    @if ($errors->has('menu_url'))
                        <div class="error" style="color: red; font-size: 12px;">
                            {{ $errors->first('menu_url') }}
                        </div>
                    @endif
                    <label class="new_user_label" for="inputMenuUrl">Menu url</label>
                    <input type="text" class="form-control" id="inputMenuUrl" name="menu_url" placeholder="Menu url">
                </div>
                <div class="form-group col-md-12">
                    <label class="new_user_label" for="inputMenuOrder">Category order</label>
                    <input type="number" class="form-control" id="inputMenuOrder" name="menu_order" placeholder="Menu order" min="0" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-xs-12 text-center">
                    <button class="btn btn-new" type="submit" value="Create new permission">Create new menu</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-xs-12 users-content padding_fix">
        <div class="col-xs-12 padding_fix cms-headings" style="border-bottom: 1px solid #222; height: 30px;">
            <div class="col-xs-12 col-sm-12 col-md-1 text-center" style="color: white; line-height: 30px;">
                <span>Menu item ID</span>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-2 text-center" style="color: white; line-height: 30px;">
                <span>Name</span>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-2 text-center" style="color: white; line-height: 30px;">
                <span>Parent menu</span>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 text-center" style="color: white; line-height: 30px;">
                <span>Active</span>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-2 text-center" style="color: white; line-height: 30px;">
                <span>URL</span>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 text-center" style="color: white; line-height: 30px;">
                <span>Order</span>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 text-center" style="color: white; line-height: 30px;">
                <span>Delete</span>
            </div>
        </div>
        @if(count($menu) > 0)
            @foreach($menu as $m)
                <div class="col-xs-12 padding_fix text-center" style="color: white; padding-top: 10px; padding-bottom: 10px;">
                    <div class="col-xs-12 col-md-1 padding_fix">
                        {{ $m->id }}
                    </div>
                    <div class="col-xs-12 col-md-2 padding_fix">
                        {{ $m->menu_name }}
                    </div>
                    <div class="col-xs-12 col-md-2 padding_fix">
                        @if($m->parent_id == 0 || !isset($m->parent))
                            -
                        @else
                            {{ $m->parent->menu_name }}
                        @endif
                    </div>
                    <div class="col-xs-12 col-md-1 padding_fix">
                        <div class="pretty p-default p-thick p-pulse" style="margin-right: -5px;">
                            <input type="checkbox" class="admin-checkbox is-active" name="is_active" id="{{$m->id}}" @if($m->active == '1') checked="checked"  @endif >
                            <div class="state p-success-o">
                                <label></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-2 padding_fix">
                        @if($m->menu_url == "" || !isset($m->menu_url))
                            -
                        @else
                            {{ $m->menu_url }}
                        @endif
                    </div>
                    <div class="col-xs-12 col-md-1 text-center">
                        {{ $m->order }}
                    </div>
                    <div class="col-xs-12 col-md-1 text-center">
                        {!! Form::open(['route' => ['menu.destroy', $m->id], 'method' => 'delete', 'onsubmit' => 'return ConfirmDelete()']) !!}
                        <button type="submit" style="background: transparent; border: none;">
                            <i class="fa fa-times" style="font-size: 16px; color: red;"></i>
                        </button>
                        {!! Form::close() !!}
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-xs-12 padding_fix text-center" style="color: white; padding-top: 10px; padding-bottom: 10px;">
                There are no menu items to display
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
                url: 'change_active_menu',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": this.id
                },
                success: function(data){
                }
            });
        });

        $(document).ready( function() {
            $('#new_menu_add').click( function() {
                $('#new_menu_div').toggle("fast");
            });

            /*
                $('#summernote').summernote({
                    disableResizeEditor: true,
                    placeholder: 'write here...'
                });
                $('.note-statusbar').hide();
            */
        })

    </script>
@stop