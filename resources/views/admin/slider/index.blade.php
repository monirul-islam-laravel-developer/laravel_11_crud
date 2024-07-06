@extends('admin.master.master')

@section('title')
    Slider page
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
                                <h3 class="card-title">All Slider</h3>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-bordered text-nowrap border-bottom">
                                        <thead>
                                        <div class="d-flex justify-content-end mb-4">
                                            <a href="{{route('slider.create')}}" class="btn btn-primary">Add Slider</a>
                                        </div>
                                        <tr>
                                            <th class="border-bottom-0">Sl</th>
                                            <th class="border-bottom-0">Title</th>
                                            <th class="border-bottom-0">Image</th>
                                            <th class="border-bottom-0">Status</th>
                                            <th class="border-bottom-0">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sliders as $slider)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$slider->title}}</td>
                                                <td><img src="{{asset($slider->image)}}" height="50" width="80"></td>
                                                <td>
                                                    @if($slider->status==1)

                                                        <a href="{{route('slider.show',$slider->id)}}" class="btn btn-primary">Active</a>
                                                    @else
                                                        <a href="{{route('slider.show',$slider->id)}}" class="btn btn-warning">Inactive</a>
                                                    @endif

                                                </td>

                                                <td>
                                                    <a href="{{route('slider.edit',$slider->id)}}" class="btn btn-success btn-lg" title="Edit">
                                                        <i class="ri-edit-box-fill"></i>
                                                    </a>

                                                    <button type="button" onclick="confirmDelete({{$slider->id}});" class="btn btn-danger btn-lg" title="Delete">
                                                        <i class="ri-chat-delete-fill"></i>
                                                    </button>

                                                    <form action="{{route('slider.destroy',$slider->id)}}" method="POST" id="categoryDeleteForm{{$slider->id}}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <script>
                                                        function confirmDelete(categoryId) {
                                                            var confirmDelete = confirm('Are you sure you want to delete this?');
                                                            if (confirmDelete) {
                                                                document.getElementById('categoryDeleteForm' + categoryId).submit();
                                                            } else {
                                                                return false;
                                                            }
                                                        }
                                                    </script>
                                                </td>
                                            </tr>
                                        @endforeach
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


