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
                            <label for="name" class="mb-2">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                        </div>
                        <div class="form-group text-start mb-2">
                            <label for="business_name" class="mb-2">Busienss Name</label>
                            <input type="text" class="form-control" id="business_name" name="business_name"
                                placeholder="Enter Busienss Name">
                        </div>
                        <div class="form-group text-start mb-2">
                            <label for="address" class="mb-2">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Enter Address">
                        </div>
                        <div class="form-group text-start mb-2">
                            <label for="phone" class="mb-2">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="Enter Phone">
                        </div>
                        <div class="form-group text-start mb-2">
                            <label for="email" class="mb-2">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter Email">
                        </div>
                        <hr>
                        <div class="form-group text-end mb-2">
                            <input type="submit" class="btn btn-primary" value="Add new Customer">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
