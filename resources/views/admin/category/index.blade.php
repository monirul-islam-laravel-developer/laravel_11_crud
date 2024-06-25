@extends('admin.master.master')

@section('title')
    Category page
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
                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">All Category</h3>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-bordered text-nowrap border-bottom">
                                        <thead>
                                        <div class="d-flex justify-content-end mb-4">
                                            <a href="" class="btn btn-primary">Add Category</a>
                                        </div>
                                        <tr>
                                            <th class="border-bottom-0">Sl</th>
                                            <th class="border-bottom-0">Name</th>
                                            <th class="border-bottom-0">Image</th>
                                            <th class="border-bottom-0">Status</th>
                                            <th class="border-bottom-0">Action</th>
                                            <th class="border-bottom-0">Start date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->


            </div>
        </div>
    </div>
@endsection
