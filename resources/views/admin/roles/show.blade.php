@extends('admin.master.master')

@section('title')
    Role Add Page
@endsection

@section('body')
    <div class="app-content main-content mt-0">
        <div class="side-app">
            <div class="main-container container-fluid">
                <div class="container">
                    <h1>Role Details</h1>
                    <div class="card">
                        <div class="card-header">
                            Role Information
                        </div>
                        <div class="card-body">
                            <p><strong>Name:</strong> {{ $role->name }}</p>
                            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection



