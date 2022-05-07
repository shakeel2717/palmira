@extends('admin.layout.app')
@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="page-header-title">Add new Department</h1>
            </div>
            <!-- End Col -->

            <div class="col-auto">
                <a class="btn btn-primary" href="{{ route('admin.department.index') }}">
                    <i class="bi-person-fill me-1"></i> All Customer
                </a>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <div class="row justify-content-sm-center text-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.department.store') }}" method="POST">
                        @csrf
                        <div class="form-group text-start mb-2">
                            <label for="name" class="mb-2">Department Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Department name">
                        </div>
                        <div class="form-group text-start mb-2">
                            <label for="description" class="mb-2">Department Description</label>
                            <input type="text" class="form-control" id="description" name="description"
                                placeholder="Enter Department Description">
                        </div>
                        <hr>
                        <div class="form-group text-end mb-2">
                            <input type="submit" class="btn btn-primary" value="Add new Department">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
