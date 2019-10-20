@extends('user.app')

@section('bg-img', asset('user/img/home-bg.jpg'))

@section('header-title', 'Talk About It Blog')

@section('sub-heading', 'talk the talk')

@section('main-content')

    <style>
        li.page-item a {
            color: white;
            background-color: black;
        }
        li.page-item .page-link:active {
            color: white;
            background-color: red !important;
        }
    </style>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                @forelse($posts as $post)

                    <div class="post-preview">
                        <a href="{{ route('post', $post->slug) }}">
                            <h2 class="post-title">
                                {{ $post->title }}
                            </h2>
                            <h3 class="post-subtitle">
                                {{ $post->subtitle }}
                            </h3>
                        </a>
                        <p class="post-meta">Posted by
                            <a href="#">{{$post->post_by }}</a>
                            - {{ $post->created_at->diffForHumans() }}</p>
                    </div>

                    <hr>

                @empty
                    <div class="text-center">
                        <p>Sorry no post are published at the moment....</p>
                        <a href="{{ route('post.create') }}"
                           class="btn btn-primary"
                        >
                            Create Post
                        </a>

                        <a href="{{ route('post.index') }}"
                           class="btn btn-dark"
                        >
                            Publish a Post
                        </a>
                    </div>

                @endforelse

                <!-- Pager -->
                    <div class="clearfix mt-4">
                        {{ $posts->links() }}
                    </div>

            </div>
        </div>
    </div>

    <hr>
@endsection
