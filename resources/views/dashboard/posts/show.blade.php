@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-4 justify-content-center">
            <div class="col-lg-8">
                <h2>{{ $post->title }}</h2>

                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span>
                    Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><span
                            data-feather="trash"></span> Delete</button>
                </form>

                @if ($post->image)
                    <div style="max-height: 350px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mt-3"
                            alt="{{ $post->category->name }}">
                    </div>
                @else
                    <img src="https://via.placeholder.com/1200x400.png?text={{ urlencode($post->category->name) }}"
                        class="img-fluid mt-3" alt="{{ $post->category->name }}">
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
