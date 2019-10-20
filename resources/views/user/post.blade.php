@extends('user.app')

@section('bg-img', Storage::disk('local')->url($post->image))

@section('header-title', $post->title)

@section('sub-heading', $post->subtitle)

@section('main-content')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0"></script>


    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto" >
                    <small>
                        <strong>Created {{ $post->created_at->diffForHumans() }}</strong>
                    </small>
                    @foreach($post->categories as $category)
                        <a href="{{ route('category', $category->slug) }}">
                            <small class="float-right" style="margin-right: 20px;">
                            {{ $category->name }}
                            </small>
                        </a>
                    @endforeach
                    {!! htmlspecialchars_decode($post->body) !!}

                    {{-- Tag cloud--}}
                    <h3>Tag Clouds</h3>
                    @foreach($post->tags as $tag)
                        <a href="{{ route('tag', $tag->slug) }}">
                            <small class="float-left"
                               style="margin-right: 20px;
                                border-radius: 5px;
                                border: 1px solid gray;
                                padding: 5px;"
                        >
                            {{ $tag->name }}
                            </small>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- facebook comments -->
            <div class="fb-comments mt-4" data-href="{{ Request::url() }}" data-width="" data-numposts="10"></div>

        </div>
    </article>

    <hr>

@endsection
