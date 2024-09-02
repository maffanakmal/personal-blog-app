@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Categories</h1>
    </div>
    <div class="col-lg-8">
        <form method="POST" action="/dashboard/categories" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <div class="invalid-feedback mt-0">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    value="{{ old('slug') }}" required>
                @error('slug')
                    <div class="invalid-feedback mt-0">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Post Image</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                <img class="img-preview img-fluid mt-3 col-sm-6">
                @error('image')
                    <div class="invalid-feedback mt-0">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Categories</button>
        </form>
    </div>

    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', () => {
            fetch('/dashboard/categories/checkCategorySlug?name=' + name.value)
                .then(response => response.json())
                .then(data => {
                    slug.value = data.slug;
                });
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewImage() {
            const image = document.querySelector('#image')
            const preview = document.querySelector('.img-preview')

            preview.style.display = 'block'

            const oFReader = new FileReader()
            oFReader.readAsDataURL(image.files[0])
            
            oFReader.onload = function(oFREvent) {
                preview.src = oFREvent.target.result
            }
        }

        
    </script>
@endsection
