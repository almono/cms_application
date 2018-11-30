@extends('front.app', ['seo_title' => $page->seo_title])
@section('front-content')
    @if(isset($page->page_title) && !is_null($page->page_title))
        <h1>{{ $page->page_title }}</h1>
    @endif
    <div class="col-xs-12 padding_fix">
        @if(isset($page->description_1) && !is_null($page->description_1))
            {!! $page->description_1 !!}
        @else
            <div class="col-xs-12 text-center">
                There is no content to display :(
            </div>
        @endif
    </div>
@stop