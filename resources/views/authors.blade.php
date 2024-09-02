@extends('layouts.main')

@section('container')
   <h1 class="mb-5 text-center">All Categories</h1>

    <div class="container">
        <div class="row">
            @foreach ($authors as $author)
                <div class="col-sm-4 mb-3">
                    <div class="card">
                        @if ($author->image)
                            <img src="{{ asset('storage/' . $author->image) }}" class="card-img" alt="{{ $author->name }}"
                                class="card-img" alt="...">
                        @else
                            <img src="https://via.placeholder.com/500x500.png?text={{ urlencode($author->name) }}"
                                class="card-img" alt="{{ $author->name }}" class="card-img" alt="...">
                        @endif

                        <div class="card-img-overlay d-flex p-4">
                            <h5 class="card-title"><a href="/blog?author={{ $author->username }}"
                                    class="text-decoration-none">{{ $author->name }}</a></h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection
