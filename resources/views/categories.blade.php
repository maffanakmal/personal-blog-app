@extends('layouts.main')

@section('container')
    <h1 class="mb-5">All Categories</h1>

    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-sm-4 mb-3">
                    <div class="card">
                        @if ($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}" class="card-img" alt="{{ $category->name }}"
                                class="card-img" alt="...">
                        @else
                            <img src="https://via.placeholder.com/500x500.png?text={{ urlencode($category->name) }}"
                                class="card-img" alt="{{ $category->name }}" class="card-img" alt="...">
                        @endif

                        <div class="card-img-overlay d-flex p-4">
                            <h5 class="card-title"><a href="/blog?category={{ $category->slug }}"
                                    class="text-decoration-none">{{ $category->name }}</a></h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection
