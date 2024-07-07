@extends('admin.master.master')

@section('title')
    Slider Add Page
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
                                <h4 class="card-title">Slider Add Form</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data" id="categoryForm">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail2">Title</label>
                                        <input type="text" name="title" required class="form-control" id="exampleInputEmail2" placeholder="Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail2">Link</label>
                                        <input type="text" name="link"  class="form-control" id="exampleInputEmail2" placeholder="Link">
                                    </div>
                                    <div class="form-group">
                                        <label for="formFile" class="form-label">Image</label>
                                        <input class="form-control file-input" type="file" name="image" id="formFile" onchange="previewImage(this)">
                                        <img id="imagePreview" src="#" alt="Image Preview" class="img-fluid d-none" height="80" width="120">
                                    </div>
                                    <div class="col-12 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary btn-w-md mt-3">Submit</button>
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

