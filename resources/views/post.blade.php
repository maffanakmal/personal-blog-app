@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>{{ $post->title }}</h2>

                <p>By. <a href="/blog?author={{ $post->author->username }}"
                        class="text-decoration-none">{{ $post->author->name }}</a> in <a
                        href="/blog?category={{ $post->category->slug }}"
                        class="text-decoration-none">{{ $post->category->name }}</a></p>

                @if ($post->image)
                    <div style="max-height: 350px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mt-3"
                            alt="{{ $post->category->name }}">
                    </div>
                @else
                    <img src="https://via.placeholder.com/1200x400.png?text={{ urlencode($post->category->name) }}"
                        class="img-fluid" alt="{{ $post->category->name }}">
                @endif

                <article class="my-3">
                    {!! $post->body !!}
                </article>

                <hr>
                <p>{{ $post->created_at->format('F j, Y') }} </p>

                <a href="/blog" class="text-decoration-none">Back to posts</a>
            </div>
        </div>
    </div>
@endsection
