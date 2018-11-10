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
<div class="col-xs-12 text-right">
    @if($menu->render() != "")
        {!! $menu->render() !!}
    @endif
</div>