@foreach($abilities as $a)
    <div class="col-xs-12 padding_fix text-center" style="color: white; padding-top: 10px; padding-bottom: 10px; @if(!$loop->last) border-bottom: 1px solid #222; @endif">
        <div class="col-xs-12 col-sm-12 col-md-2 padding_fix">
            {{ $a->title }}
        </div>
        <div class="col-xs-6 col-sm-6 col-md-1 padding_fix">
            <div class="pretty p-default p-thick p-pulse" style="margin-right: -5px;">
                <input type="checkbox" class="admin-checkbox is-active" name="is_active" id="{{$a->id}}" @if($a->active == '1') checked="checked"  @endif >
                <div class="state p-success-o">
                    <label></label>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-2 padding_fix hidden-xs hidden-sm">
            {{ $a->created_at }}
        </div>
        <div class="col-xs-6 col-sm-6 col-md-1 padding_fix">
            {!! Form::open(['route' => ['abilities.destroy', $a->id], 'method' => 'delete', 'onsubmit' => 'return ConfirmDelete()']) !!}
            <button type="submit" style="background: transparent; border: none;">
                <i class="fa fa-times" style="font-size: 16px; color: red;"></i>
            </button>
            {!! Form::close() !!}
        </div>
    </div>
@endforeach
<div class="col-xs-12 text-right">
    @if($abilities->render() != "")
        {!! $abilities->render() !!}
    @endif
</div>