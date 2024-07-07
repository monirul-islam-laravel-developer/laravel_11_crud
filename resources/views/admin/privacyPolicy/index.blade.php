@extends('admin.master.master')

@section('title')
    Privacy Policy Page
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
                                <h4 class="card-title">Privacy Policy Form</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ isset($privacypolicy) ? route('privacyPolicy.update', $privacypolicy->id) : route('privacyPolicy.store') }}" method="POST" enctype="multipart/form-data" id="logoForm">
                                    @csrf
                                    @if(isset($privacypolicy))
                                        @method('PUT')
                                    @endif
                                    <div class="form-group">
                                        <label for="privacy_policy">Privacy & Policy</label>
                                        <textarea class="form-control" id="summernote" name="privacy_policy">{!! old('privacy_policy', $privacypolicy->privacy_policy ?? '') !!}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="condition">Condition</label>
                                        <textarea class="form-control" name="condition" id="summernote1">{!! old('condition', $privacypolicy->condition ?? '') !!}</textarea>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary btn-w-md mt-3">{{ isset($privacypolicy) ? 'Update' : 'Submit' }}</button>
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
        $('#summernote').summernote({
            tabsize: 2,
            height: 100
        });
    </script>
    <script>
        $('#summernote1').summernote({
            tabsize: 2,
            height: 100
        });
    </script>
@endsection
