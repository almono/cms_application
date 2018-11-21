@foreach($menu as $m)
    <div class="col-xs-12 padding_fix text-center" style="color: white; padding-top: 10px; padding-bottom: 10px; @if(!$loop->last) border-bottom: 1px solid #222; @endif">
        <div class="col-xs-12 col-md-1 padding_fix hidden-xs hidden-sm">
            {{ $m->id }}
        </div>
        <div class="col-xs-6 col-md-2 padding_fix m-5-bottom">
            {{ $m->menu_name }}
        </div>
        <div class="col-xs-6 col-md-2 padding_fix m-5-bottom">
            @if($m->parent_id == 0 || !isset($m->parent))
                -
            @else
                {{ $m->parent->menu_name }}
            @endif
        </div>
        <div class="col-xs-6 col-md-1 padding_fix m-5-bottom">
            <div class="pretty p-default p-thick p-pulse" style="margin-right: -5px;">
                <input type="checkbox" class="admin-checkbox is-active" name="is_active" id="{{$m->id}}" @if($m->active == '1') checked="checked"  @endif >
                <div class="state p-success-o">
                    <label></label>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-2 padding_fix m-5-bottom">
            @if($m->menu_url == "" || !isset($m->menu_url))
                -
            @else
                {{ $m->menu_url }}
            @endif
        </div>
        <div class="col-xs-12 col-md-1 text-center hidden-xs hidden-sm">
            {{ $m->order }}
        </div>
        <div class="col-xs-6 col-md-1 text-center m-5-bottom">
            <a href="{{ route('menu.show', $m->id) }}">
                <i class="fa fa-edit" style="font-size: 18px; color: lightgreen;"></i>
            </a>
        </div>
        <div class="col-xs-6 col-md-1 text-center m-5-bottom">
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