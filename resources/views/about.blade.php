@extends('layouts.main')

@section('container')
    <h1>About</h1>
    <div class="card" style="width: 18rem;">
        <img src="img/{{ $image }}" alt="{{ $name }}" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">{{ $name }}</h5>
            <p class="card-text">{{ $bio }}</p>
        </div>
    </div>
@endsection
