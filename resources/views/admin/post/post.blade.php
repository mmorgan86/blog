@extends('admin.layouts.app')

@section('headSection')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('../../admin/bower_components/select2/dist/css/select2.min.css')}}">
@endsection

@section('main-content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                New Post
                <small>Advanced form element</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">Editors</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">


                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Title</h3>
                        </div>
                        <!-- /.box-header -->

                        <!-- errors -->
                        @include('includes.messages')

                        <!-- form start -->
                        <form role="form" action="{{ route('post.store') }}" method='POST' enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">

                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label for="title">Post Title</label>
                                        <input type="text" class="form-control" id="title"
                                               name='title' placeholder="Enter Title">
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitle">Post Subtitle</label>
                                        <input type="text" class="form-control" name="subtitle" id="subtitle"
                                               placeholder="Enter Subtitles">
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">Post Slug</label>
                                        <input type="text" class="form-control" name='slug' id="slug"
                                               placeholder="Enter Slug">
                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <br>

                                    <div class="form-group">
                                        <div class="pull-left">
                                            <label for="image">File input</label>
                                            <input type="file" id="image" name="image">
                                        </div>

                                        <div class="checkbox pull-right">
                                            <label style="font-weight: bold;font-size: 1.5rem;">
                                                <input type="checkbox"
                                                        name="status"
                                                       value="1"
                                                >
                                                Publish?
                                            </label>
                                        </div>
                                    </div>

                                    <br>
                                    <br>

                                    <div class="form-group">
                                        <label>Select Tags</label>
                                        <select class="form-control select2 select2-hidden-accessible" multiple=""
                                                data-placeholder="Type here" style="width: 100%;" tabindex="-1"
                                                aria-hidden="true"
                                                name="tags[]"
                                        >

                                            @if($tags)
                                                @foreach($tags as $tag)
                                                    <option
                                                            value="{{ $tag->id}}"
                                                    >{{ $tag->name }}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Select Categories</label>
                                        <select class="form-control select2 select2-hidden-accessible" multiple=""
                                                data-placeholder="Type here" style="width: 100%;" tabindex="-1"
                                                aria-hidden="true"
                                                name="catorgies[]"
                                        >

                                                @if($categories)
                                                    @foreach($categories as $category)
                                                        <option
                                                                value="{{ $category->id}}"
                                                        >
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                @endif

                                        </select>
                                    </div>

                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Begin Typing Here
                                        <small>Simple and fast</small>
                                    </h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                                                title="Collapse">
                                            <i class="fa fa-minus"></i></button>
                                    </div>
                                    <!-- /. tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body pad">
                                    <textarea name='body' id='editor1' placeholder="Speak your mind here..."
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                    ></textarea>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('post.index') }}" class="btn btn-danger">Back</a>
                            </div>

                        </form>
                    </div>


                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

  @endsection

@section('footerSection')
    <!-- Select2 -->
    <script src="{{asset('../../admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            //Initialize Select2 Elements
            $('.select2').select2();
        });
    </script>

    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>

    {{--<!-- Bootstrap WYSIHTML5 -->--}}
    {{--<script src="{{ asset('../../admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>--}}

    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            // CKEDITOR.replace('editor1');
            //bootstrap WYSIHTML5 - text editor
            // $('.textarea').wysihtml5();

        });

        ClassicEditor
            .create( document.querySelector( '#editor1' ) )
            .then( editor => {
                console.log( 'Editor was initialized', editor );
            } )
            .catch( error => {
                console.error( error.stack );
            } );

    </script>
@endsection
