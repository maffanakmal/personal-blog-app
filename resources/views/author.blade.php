@extends('layouts.main')

@section('container')
    <h1 class="mb-5">Author Posts Page</h1>

    @foreach ($posts as $post)
        <ul class="list-group mb-2">
            <li class="list-group-item p-4">
                <h5><a href="/blog/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h5>

                <p>By. <a href="/author/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
                <p>{{ $post->excerpt }}</p>

                <a href="/blog/{{ $post->slug }}" class="text-decoration-none">Read More..</a>
            </li>
        </ul>
    @endforeach
@endsection
