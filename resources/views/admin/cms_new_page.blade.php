@extends('admin.admin')
@section('admin-content')
    @include('admin.cms_admin_content_top')
    <div class="col-xs-12 users-content">
        <div class="row">
            <div class="col-xs-12" style="padding: 20px 15px;">
                <span style="font-size: 30px; font-weight: 600;">New page creator</span>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4" style="padding-top: 20px;">
                {!! Form::open(array('route' => 'pages.store', 'files' => 'true')) !!}
                {!! Form::token() !!}
                <div class="form-row">
                    <div class="form-group col-md-12 flex_display padding_fix">
                        @if ($errors->has('title'))
                            <div class="error" style="color: red; font-size: 12px;">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                        <div class="col-xs-2 padding_fix text-center">
                            <label class="new_user_label" for="inputTitle4">Title</label>
                        </div>
                        <div class="col-xs-10">
                            <input type="text" class="form-control" id="inputTitle4" name="title" placeholder="Title" required>
                        </div>
                    </div>
                    <div class="form-group col-md-12 flex_display padding_fix">
                        @if ($errors->has('seo'))
                            <div class="error" style="color: red; font-size: 12px;">
                                {{ $errors->first('seo') }}
                            </div>
                        @endif
                            <div class="col-xs-2 padding_fix text-center">
                                <label class="new_user_label" for="inputSeo4">SEO</label>
                            </div>
                            <div class="col-xs-10">
                                <input type="text" class="form-control" id="inputSeo4" name="seo" placeholder="Description used for SEO">
                            </div>
                    </div>
                    <div class="form-group col-md-12 flex_display padding_fix">
                        @if ($errors->has('page_image'))
                            <div class="error" style="color: red; font-size: 12px;">
                                {{ $errors->first('page_image') }}
                            </div>
                        @endif
                        <div class="col-xs-2 padding_fix text-center">
                            <label class="new_user_label" for="inputPageImage4">Page image</label>
                        </div>
                        <div class="col-xs-10">
                            <input type="file" id="inputPageImage4" name="page_image">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-xs-12 text-center">
                        <button class="btn btn-new" type="submit" value="Create new user">Create</button>
                    </div>
                </div>
            </div>

            <div class="col-md-8 page_descriptions" style="padding-top: 20px; margin-bottom: 20px;">
                <div class="col-xs-12 page_desc1_open" style="border: 1px solid rgb(34,34,34); padding: 5px; background: #464646; z-index: 501;">
                    <i class="fa fa-plus page_desc1_icon" style="padding-right: 5px;"></i><span class="page1">Edit main description</span>
                </div>
                <div class="col-xs-12 page_desc2_open" style="border: 1px solid rgb(34,34,34); padding: 5px; background: #464646; z-index: 501;">
                    <i class="fa fa-plus page_desc2_icon" style="padding-right: 5px;"></i><span class="page2">Edit additional description</span>
                </div>
                <div class="col-xs-12 text-center page_desc1"></div>
                <div class="col-xs-12 text-center page_desc2"></div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop
@section('admin-scripts')
    <script type="text/javascript">

        $(document).ready( function() {
            $('.page_desc1').summernote({
                disableResizeEditor: true,
                placeholder: 'Main page description...'
            });
            $('.page_desc2').summernote({
                disableResizeEditor: true,
                placeholder: 'Additional page description...'
            });

            $(".page_desc1").next(".note-editor").hide();
            $(".page_desc2").next(".note-editor").hide();

            $(".page_desc1_open").on('click', function() {
                $(".page_desc1").next(".note-editor").slideToggle("smooth");
                $(".page_desc2").next(".note-editor").slideUp("smooth");
                $(".page_desc1_icon").toggleClass("fa-plus fa-minus");
                $(".page_desc2_icon").removeClass("fa-minus");
                $(".page_desc2_icon").addClass("fa-plus");
                $(".page_desc1_open").css("color","red");
                $(".page_desc2_open").css("color","white");
            });

            $(".page_desc2_open").on('click', function() {
                $(".page_desc2").next(".note-editor").slideToggle("smooth");
                $(".page_desc1").next(".note-editor").slideUp("smooth");
                $(".page_desc2_icon").toggleClass("fa-plus fa-minus");
                $(".page_desc1_icon").removeClass("fa-minus");
                $(".page_desc1_icon").addClass("fa-plus");
                $(".page_desc2_open").css("color","red");
                $(".page_desc1_open").css("color","white");
            });

        })

    </script>
@stop