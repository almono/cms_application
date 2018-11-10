@foreach($users as $u)
    <div class="col-xs-12 padding_fix text-center" style="color: white; padding-top: 10px; padding-bottom: 10px;">
        <div class="col-xs-12 col-md-2 padding_fix">
            {{ $u->username }}
        </div>
        <div class="col-xs-12 col-md-2 padding_fix">
            {{ $u->email }}
        </div>
        <div class="col-xs-12 col-md-1 padding_fix">
            <div class="pretty p-default p-thick p-pulse" style="margin-right: -5px;">
                <input type="checkbox" class="admin-checkbox is-active" name="is_active" id="{{$u->id}}" @if($u->active == '1') checked="checked"  @endif >
                <div class="state p-success-o">
                    <label></label>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-1 padding_fix">
            <div class="pretty p-default p-thick p-pulse" style="margin-right: -5px;">
                <input type="checkbox" class="admin-checkbox is-admin" name="is_admin" id="{{$u->id}}" @if($u->super_admin == '1') checked="checked" @endif >
                <div class="state p-success-o">
                    <label></label>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-1 padding_fix">
            {{ $u->created_at }}
        </div>
        <div class="col-xs-12 col-md-1 padding_fix">
            <a href="{{ route('users.show', $u->id) }}">
                <i class="fa fa-edit" style="font-size: 18px; color: lightgreen;"></i>
            </a>
        </div>
    </div>
@endforeach
<div class="col-xs-12 text-right">
    @if($users->render() != "")
        {!! $users->render() !!}
    @endif
</div>