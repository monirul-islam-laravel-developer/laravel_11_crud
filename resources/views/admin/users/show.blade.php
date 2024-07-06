@extends('admin.master.master')

@section('title')
    User page
@endsection

@section('body')
    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">


                <!-- PAGE-HEADER -->

                <!-- End Row -->

                <!-- Row -->
                <div class="container">
                    <h1>User Details</h1>
                    <div class="card">
                        <div class="card-header">
                            User Information
                        </div>
                        <div class="card-body">
                            <p><strong>Name:</strong> {{ $user->name }}</p>
                            <p><strong>Email:</strong> {{ $user->email }}</p>
                            <p><strong>Roles:</strong> {{ implode(', ', $user->getRoleNames()->toArray()) }}</p>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to List</a>
                        </div>
                    </div>
                </div>
                <!-- End Row -->


            </div>
        </div>
    </div>
@endsection


