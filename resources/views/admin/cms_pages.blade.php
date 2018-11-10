@extends('admin.admin')
@section('admin-content')
    @include('admin.cms_admin_content_top')
    <div class="col-xs-12 padding_fix" style="padding-top: 15px; position: relative;">
        <a class="btn btn-new" href="{{ route('new_page_form') }}" style="float: right;"><i class="fa fa-plus" style="padding-right: 5px;"></i>Add new page</a>
    </div>
    <div class="col-xs-12 users-content padding_fix">
        <div class="col-xs-12 padding_fix cms-headings" style="border-bottom: 1px solid #222; height: 30px;">
            <div class="col-xs-12 col-sm-12 col-md-1 text-center" style="color: white; line-height: 30px;">
                <span>Page ID</span>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-2 text-center" style="color: white; line-height: 30px;">
                <span>Page title</span>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 text-center" style="color: white; line-height: 30px;">
                <span>Active</span>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-2 text-center" style="color: white; line-height: 30px;">
                <span>Created on</span>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 text-center" style="color: white; line-height: 30px;">
                <span>Delete</span>
            </div>
        </div>
        @if(count($pages) > 0)
            <div class="pages_list">
                @include('admin.partials.cms_page_listing')
            </div>
        @else
            <div class="col-xs-12 padding_fix text-center" style="color: white; padding-top: 10px; padding-bottom: 10px;">
                There are no pages to display
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
                url: 'change_active_page',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": this.id
                },
                success: function(data){
                }
            });
        });

        $(function() {
            $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();

                $('.page_list a').css('color', '#1eb91e');

                var url = $(this).attr('href');
                getPages(url);
                window.history.pushState("", "", url); // sets url to current pagination href
            });

            function getPages(url) {
                $.ajax({
                    url : url
                }).done(function (data) {
                    $('.page_list').html(data);
                }).fail(function () {
                    alert('Abilities could not be loaded.');
                });
            }
        });
    </script>
@stop