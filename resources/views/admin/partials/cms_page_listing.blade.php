@foreach($pages as $p)
    <div class="col-xs-12 padding_fix text-center" style="color: white; padding-top: 10px; padding-bottom: 10px;">
        <div class="col-xs-12 col-md-1 padding_fix">
            {{ $p->id }}
        </div>
        <div class="col-xs-12 col-md-2 padding_fix">
            {{ $p->page_title }}
        </div>
        <div class="col-xs-12 col-md-1 padding_fix">
            <div class="pretty p-default p-thick p-pulse" style="margin-right: -5px;">
                <input type="checkbox" class="admin-checkbox is-active" name="is_active" id="{{$p->id}}" @if($p->active == '1') checked="checked" @endif >
                <div class="state p-success-o">
                    <label></label>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-2 padding_fix">
            {{ $p->created_at }}
        </div>
        <div class="col-xs-12 col-md-1 padding_fix">
            <a href="{{ route('pages.show', $p->id) }}">
                <i class="fa fa-edit" style="font-size: 18px; color: lightgreen;"></i>
            </a>
        </div>
        <div class="col-xs-12 col-md-1 text-center">
            {!! Form::open(['route' => ['pages.destroy', $p->id], 'method' => 'delete', 'onsubmit' => 'return ConfirmDelete()']) !!}
            <button type="submit" style="background: transparent; border: none;">
                <i class="fa fa-times" style="font-size: 16px; color: red;"></i>
            </button>
            {!! Form::close() !!}
        </div>
    </div>
@endforeach
<div class="col-xs-12 text-right">
    @if($pages->render() != "")
        {!! $pages->render() !!}
    @endif
</div>