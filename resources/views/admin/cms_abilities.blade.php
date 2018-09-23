@extends('admin.admin')
@section('admin-content')
    @include('admin.cms_admin_content_top')
    <div class="col-xs-12 padding_fix" style="padding-top: 15px; position: relative;">
        <a class="btn btn-new" id="new_ability_add" style="float: right;"><i class="fa fa-plus" style="padding-right: 5px;"></i>Add new ability</a>
        <div class="col-xs-12 col-sm-4 col-md-2 new_user_div" id="new_ability_div">
            {!! Form::open(array('route' => 'abilities.store')) !!}
            {!! Form::token() !!}
            <div class="form-row">
                <div class="form-group col-md-12">
                    @if ($errors->has('title'))
                        <div class="error" style="color: red; font-size: 12px;">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <label class="new_user_label" for="inputAbilityName">Ability name</label>
                    <input type="text" class="form-control" id="inputAbilityName" name="ability_name" placeholder="Ability name" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-xs-12 text-center">
                    <button class="btn btn-new" type="submit" value="Create new permission">Create new ability</button>
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
            <div class="col-xs-12 col-sm-12 col-md-2 text-center" style="color: white; line-height: 30px;">
                <span>Created on</span>
            </div>
        </div>
        @foreach($abilities as $a)
            <div class="col-xs-12 padding_fix text-center" style="color: white; padding-top: 10px; padding-bottom: 10px;">
                <div class="col-xs-12 col-md-2 padding_fix">
                    {{ $a->title }}
                </div>
                <div class="col-xs-12 col-md-1 padding_fix">
                    <div class="pretty p-default p-thick p-pulse" style="margin-right: -5px;">
                        <input type="checkbox" class="admin-checkbox is-active" name="is_active" id="{{$a->id}}" @if($a->active == '1') checked="checked"  @endif >
                        <div class="state p-success-o">
                            <label></label>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-2 padding_fix">
                    {{ $a->created_at }}
                </div>
            </div>
        @endforeach
    </div>
@stop
@section('admin-scripts')
    <script type="text/javascript">

        $('.is-active').click( function() {
            var id = $(this).attr('id');

            $.ajax({
                type: 'POST',
                url: 'change_active_ability',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": this.id
                },
                success: function(data){
                }
            });
        });

        $(document).ready( function() {
            $('#new_ability_add').click( function() {
                $('#new_ability_div').toggle("fast");
            });
        })

    </script>
@stop