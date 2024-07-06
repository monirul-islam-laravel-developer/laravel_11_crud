@extends('admin.master.master')

@section('title')
   Info Page
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
                                <h4 class="card-title">Info Form</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ isset($info) ? route('info.update', $info->id) : route('info.store') }}" method="POST" enctype="multipart/form-data" id="logoForm">
                                    @csrf
                                    @if(isset($info))
                                        @method('PUT')
                                    @endif
                                    <div class="form-group">
                                        <label for="privacy_policy">Name</label>
                                        <input type="text" name="name" value="{!! old('name', $info->name ?? '') !!}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="privacy_policy">Email</label>
                                        <input type="email" name="email" value="{!! old('name', $info->email ?? '') !!}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="privacy_policy">Mobile</label>
                                        <input type="number" name="mobile" value="{!! old('mobile', $info->mobile ?? '') !!}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="privacy_policy">Phone</label>
                                        <input type="number" name="phone" value="{!! old('phone', $info->mobile ?? '') !!}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="privacy_policy">Address</label>
                                        <textarea class="form-control" name="address">{!! old('phone', $info->address ?? '') !!}</textarea>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary btn-w-md mt-3">{{ isset($info) ? 'Update' : 'Submit' }}</button>
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


