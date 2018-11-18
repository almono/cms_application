@foreach($roles as $r)
    <div class="col-xs-12 padding_fix text-center listing_div" style="color: white; padding-top: 10px; padding-bottom: 10px;">
        <div class="col-xs-12 col-sm-12 col-md-2 padding_fix">
            {{ $r->title }}
        </div>
        <div class="col-xs-4 col-sm-4 col-md-1 padding_fix">
            <div class="pretty p-default p-thick p-pulse" style="margin-right: -5px;">
                <input type="checkbox" class="admin-checkbox is-active" name="is_active" id="{{$r->id}}" @if($r->active == '1') checked="checked"  @endif >
                <div class="state p-success-o">
                    <label></label>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-2 padding_fix hidden-xs hidden-sm">
            {{ $r->created_at }}
        </div>
        <div class="col-xs-4 col-sm-4 col-md-1 padding_fix listing_edit">
            <a href="{{ route('roles.show', $r->id) }}">
                <i class="fa fa-edit" style="font-size: 18px; color: lightgreen;"></i>
            </a>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-1 padding_fix">
            {!! Form::open(['route' => ['roles.destroy', $r->id], 'method' => 'delete', 'onsubmit' => 'return ConfirmDelete()']) !!}
            <button type="submit" style="background: transparent; border: none;">
                <i class="fa fa-times" style="font-size: 16px; color: red;"></i>
            </button>
            {!! Form::close() !!}
        </div>
    </div>
@endforeach
<div class="col-xs-12 text-right">
    @if($roles->render() != "")
        {!! $roles->render() !!}
    @endif
</div>