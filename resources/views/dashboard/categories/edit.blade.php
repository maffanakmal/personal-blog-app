@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Category</h1>
    </div>
    <div class="col-lg-8">
        <form method="POST" action="/dashboard/categories/{{ $category->slug }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $category->name) }}" required autofocus>
                @error('name')
                    <div class="invalid-feedback mt-0">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    value="{{ old('slug', $category->slug) }}" required>
                @error('slug')
                    <div class="invalid-feedback mt-0">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Category Image</label>
                <input type="hidden" name="oldImage" value="{{ $category->image }}">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image" onchange="previewImage()">
                @if ($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" class="img-preview img-fluid mt-3 col-sm-6">
                @else
                    <img class="img-preview img-fluid mt-3 col-sm-6 d-block">
                @endif
                @error('image')
                    <div class="invalid-feedback mt-0">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mb-3">Update Category</button>
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
