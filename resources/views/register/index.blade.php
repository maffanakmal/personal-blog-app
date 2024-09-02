@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-4">

            <main class="form-register w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center">Register</h1>
                <form action="/register" method="POST">
                    @csrf
                    <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            placeholder="Fullname" name="name" required value="{{ old('name') }}">
                        <label for="name">Name</label>
                        @error('name')
                            <div class="invalid-feedback mt-0">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" name="username" required  value="{{ old('username') }}">
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback mt-0">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                            placeholder="name@example.com" required value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback mt-0">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password"  required>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback mt-0">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
                </form>
                <hr>
                <small class="d-block text-center mt-3">Have an account? <a href="/login">Login!</a></small>
            </main>
        </div>
    </div>
@endsection
