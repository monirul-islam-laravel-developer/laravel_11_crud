@extends('admin.master.master')

@section('title')
    SubCategory page
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
                                <h3 class="card-title">All SubCategory</h3>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-bordered text-nowrap border-bottom">
                                        <thead>
                                        <div class="d-flex justify-content-end mb-4">
                                            <a href="{{route('subcategory.create')}}" class="btn btn-primary">Add Category</a>
                                        </div>
                                        <tr>
                                            <th class="border-bottom-0">Sl</th>
                                            <th class="border-bottom-0">Category Name</th>
                                            <th class="border-bottom-0">Name</th>
                                            <th class="border-bottom-0">Image</th>
                                            <th class="border-bottom-0">Status</th>
                                            <th class="border-bottom-0">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($subcategories as $subcategory)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$subcategory->category->name}}</td>
                                                <td>{{$subcategory->name}}</td>
                                                <td><img src="{{asset($subcategory->image)}}" height="50" width="80"></td>
                                                <td>
                                                    @if($subcategory->status==1)

                                                        <a href="{{route('subcategory.show',$subcategory->id)}}" class="btn btn-primary">Active</a>
                                                    @else
                                                        <a href="{{route('subcategory.show',$subcategory->id)}}" class="btn btn-warning">Inactive</a>
                                                    @endif

                                                </td>

                                                <td>
                                                    <a href="{{route('subcategory.edit',$subcategory->id)}}" class="btn btn-success btn-lg" title="Edit">
                                                        <i class="ri-edit-box-fill"></i>
                                                    </a>

                                                    <button type="button" onclick="confirmDelete({{$subcategory->id}});" class="btn btn-danger btn-lg" title="Delete">
                                                        <i class="ri-chat-delete-fill"></i>
                                                    </button>

                                                    <form action="{{route('subcategory.destroy',$subcategory->id)}}" method="POST" id="categoryDeleteForm{{$subcategory->id}}">
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


