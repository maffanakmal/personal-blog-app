@extends('layouts.main')

@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <form action="/blog" method="GET">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @elseif (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari post.." aria-label="Cari post.."
                        aria-describedby="button-addon2" name="search" autocomplete="off" value="{{ request('search') }}">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-3">
            @if ($posts[0]->image)
                <div style="max-height: 400px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top"
                        alt="{{ $posts[0]->category->name }}">
                </div>
            @else
                <img src="https://via.placeholder.com/1200x400.png?text={{ urlencode($posts[0]->category->name) }}"
                    class="card-img-top" alt="{{ $posts[0]->category->name }}">
            @endif

            <div class="card-body text-center">
                <h5 class="card-title"><a href="/blog/{{ $posts[0]->slug }}"
                        class="text-decoration-none">{{ $posts[0]->title }}</a></h5>
                <p>
                    <small>By. <a href="/blog?author={{ $posts[0]->author->username }}"
                            class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a
                            href="/blog?category={{ $posts[0]->category->slug }}"
                            class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                        {{ $posts[0]->created_at->diffForHumans() }}</small>
                </p>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a href="/blog/{{ $posts[0]->slug }}" class="text-decoration-none">Read More..</a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="position-absolute bg-dark px-3 py-2" style="border-radius: 0 0 10px 0">
                                <a href="/blog?category={{ $post->category->slug }}"
                                    class="text-white text-decoration-none">{{ $post->category->name }}
                            </div></a>
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
                                    alt="{{ $post->category->name }}">
                            @else
                                <img src="https://via.placeholder.com/500x400.png?text={{ urlencode($post->category->name) }}"
                                    class="card-img-top" alt="{{ $post->category->name }}">
                            @endif

                            <div class="card-body">
                                <h5 class="card-title"><a href="/blog/{{ $post->slug }}"
                                        class="text-decoration-none">{{ $post->title }}</a></h5>
                                <p>By. <a href="/blog?author={{ $post->author->username }}"
                                        class="text-decoration-none">{{ $post->author->name }}</a>
                                    {{ $post->created_at->diffForHumans() }} </p>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a href="/blog/{{ $post->slug }}" class="text-decoration-none">Read More..</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center display-2">No posts found.</p>
    @endif

    <div class="d-flex justify-content-end">
        {{ $posts->links() }}
    </div>

@endsection
