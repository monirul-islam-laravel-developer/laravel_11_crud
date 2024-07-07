@extends('admin.master.master')

@section('title')
    Logo Page
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
                                <h4 class="card-title">{{ isset($logo) ? 'Update Logo' : 'Add Logo' }}</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ isset($logo) ? route('logos.update', $logo->id) : route('logos.store') }}" method="POST" enctype="multipart/form-data" id="logoForm">
                                    @csrf
                                    @if(isset($logo))
                                        @method('PUT')
                                    @endif
                                    <div class="form-group">
                                        <label for="mobileLogo" class="form-label">Mobile Logo</label>
                                        <input class="form-control file-input" type="file" name="mobile_logo" id="mobileLogo" onchange="previewImage(this, 'mobilePreview')">
                                        <img id="mobilePreview" src="{{ isset($logo) ? asset($logo->mobile_logo) : '#' }}" alt="Mobile Logo Preview" class="img-fluid {{ isset($logo) ? '' : 'd-none' }}" height="80" width="120">
                                    </div>
                                    <div class="form-group">
                                        <label for="desktopLogo" class="form-label">Desktop Logo</label>
                                        <input class="form-control file-input" type="file" name="desktop_logo" id="desktopLogo" onchange="previewImage(this, 'desktopPreview')">
                                        <img id="desktopPreview" src="{{ isset($logo) ? asset($logo->desktop_logo) : '#' }}" alt="Desktop Logo Preview" class="img-fluid {{ isset($logo) ? '' : 'd-none' }}" height="80" width="120">
                                    </div>
                                    <div class="col-12 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary btn-w-md mt-3">{{ isset($logo) ? 'Update' : 'Submit' }}</button>
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
        function previewImage(input, previewId) {
            var preview = document.getElementById(previewId);
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
