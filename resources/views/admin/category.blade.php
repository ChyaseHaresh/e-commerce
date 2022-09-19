@extends('admin/layout')
@section('page_title', 'Category')
@section('category_select', 'active')
@section('container')
    @if (session()->has('message'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif

    @if (session()->has('err_message'))
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            {{ session('err_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    <h1 class="mb10">Category</h1>
    <a href="{{ url('admin/category/manage_category') }}">
        <button type="button" class="btn btn-success">
            Add Category
        </button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Category Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $list)
                            <tr>
                                <td>{{ $list->id }}</td>
                                <td>{{ $list->category_name }}</td>
                                <td>{{ $list->category_slug }}</td>
                                <td>
                                    <a href="{{ url('admin/category/manage_category/') }}/{{ $list->id }}"><button
                                            type="button" class="btn btn-success">Edit</button></a>

                                    @if ($list->status == 1)
                                        <a href="{{ url('admin/category/status/0') }}/{{ $list->id }}"><button
                                                type="button" class="btn btn-primary">Active</button></a>
                                    @elseif($list->status == 0)
                                        <a href="{{ url('admin/category/status/1') }}/{{ $list->id }}"><button
                                                type="button" class="btn btn-warning">Deactive</button></a>
                                    @endif

                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#exampleModalCenter">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <!-- END DATA TABLE-->
        </div>
                     <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter"
    aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                DO YOU REALLY WANT TO DELETE THE CATEGORY ??
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                {{-- <a href="{{ url('admin/category/delete/') }}/{{ $list->id }}"> --}}
                    <button type="button" class="btn btn-primary">Yes</button>
                {{-- </a> --}}
            </div>
        </div>
    </div>
</div>
    </div>



@endsection
