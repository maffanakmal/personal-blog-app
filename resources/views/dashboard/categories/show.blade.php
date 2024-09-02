@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-4 justify-content-center">
            <div class="col-lg-8">

                <a href="/dashboard/categories" class="btn btn-success"><span data-feather="arrow-left"></span> Back</a>
                <a href="/dashboard/categories/{{ $categories->slug }}/edit" class="btn btn-warning"><span
                        data-feather="edit"></span>
                    Edit</a>
                <form action="/dashboard/categories/{{ $categories->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><span
                            data-feather="trash"></span> Delete</button>
                </form>

                <h2 class="mt-4">{{ $categories->name }}</h2>
                @if ($categories->image)
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('storage/' . $categories->image) }}" class="img-fluid mt-3"
                            alt="{{ $categories->name }}"
                            style="max-width: 400px; object-fit: cover; object-position: center;">
                    </div>
                @else
                    <img src="https://via.placeholder.com/1200x400.png?text={{ urlencode($categories->name) }}"
                        class="img-fluid mt-3" alt="{{ $categories->name }}">
                @endif

                <hr>
                <p>{{ $categories->created_at->format('F j, Y') }} </p>

                <a href="/dashboard/categories" class="text-decoration-none">Back to categories</a>
            </div>
        </div>
    </div>
@endsection
