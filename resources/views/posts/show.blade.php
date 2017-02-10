@extends('layouts.master')

@section('content')
    <div class="col-sm-8 blog-main">
        <div class="blog-post">
            <h2 class="blog-post-title">
                {{ $post->title }}
            </h2>

            @if (count($post->tags))
                <ul>
                    @foreach ($post->tags as $tag)
                        <li>
                            <a href="/posts/tags/{{ $tag->name }}">
                                {{ $tag->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif

            <p class="blog-post-meta">
                {{ $post->created_at->format('F j, Y') }}
            </p>
            {{ $post->body }}
        </div><!-- /.blog-post -->
        @include('posts.comments')
        <hr>
        @include('posts.createcomment')
    </div>
@endsection
