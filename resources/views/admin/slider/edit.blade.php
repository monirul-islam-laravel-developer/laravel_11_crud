@extends('admin.master.master')

@section('title')
    Slider Edit Page
@endsection

@section('body')
    <div class="app-content main-content mt-0">
        <div class="side-app">
            <div class="main-container container-fluid">
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Form Elements</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Elements</li>
                        </ol>
                    </div>
                </div>
                <div class="row row-sm">
                    <div class="col-sm-12">
                        <div class="card box-shadow-0">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Slider Edit Form</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data" id="categoryForm">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="nameInput">Title</label>
                                        <input type="text" name="title" required value="{{ $slider->title }}" class="form-control" id="nameInput" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="nameInput">Link</label>
                                        <input type="text" name="link"  value="{{ $slider->link }}" class="form-control" id="nameInput" placeholder="Link">
                                    </div>
                                    <div class="form-group">
                                        <label for="formFile" class="form-label">Image</label>
                                        <input class="form-control file-input" type="file" name="image" id="formFile" onchange="previewImage(this)">
                                        <img id="imagePreview" src="{{ asset($slider->image) }}" alt="Category Image Preview" class="img-fluid {{ $slider->image ? '' : 'd-none' }}" height="80" width="120">
                                    </div>
                                    <div class="col-12 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary btn-w-md mt-3">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            var preview = document.getElementById('imagePreview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none'); // Show the preview image
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '#';
                preview.classList.add('d-none'); // Hide the preview image if no file selected
            }
        }
    </script>
@endsection

