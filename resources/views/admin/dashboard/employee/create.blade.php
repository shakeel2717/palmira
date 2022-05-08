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
                    <form action="{{ route('admin.employee.store') }}" method="POST">
                        @csrf
                        <div class="form-group text-start mb-2">
                            <label for="name" class="mb-2">Employee Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Employee name">
                        </div>
                        <div class="form-group text-start mb-2">
                            <label for="email" class="mb-2">Employee Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter Employee Email">
                        </div>
                        <div class="form-group text-start mb-2">
                            <label for="password" class="mb-2">Employee Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter Employee Password">
                        </div>
                        <div class="form-group text-start mb-2">
                            <label for="password" class="mb-2">User Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="user">Employee</option>
                            </select>
                        </div>
                        <div class="form-group text-start mb-2">
                            <label for="counter_id" class="mb-2">Counter #</label>
                            <select name="counter_id" id="counter_id" class="form-control">
                                @foreach ($counters as $counter)
                                    <option value="{{ $counter->id }}">{{ $counter->name }} |
                                        {{ $counter->description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group text-start mb-2">
                            <label for="password" class="mb-2">User Control</label>
                            <div class="row gx-3">
                                <!-- Check -->
                                @foreach ($departments as $department)
                                    <div class="col-6">
                                        <div class="form-check form-check-label-highlighter text-center">
                                            <input type="checkbox" class="form-check-input"
                                                name="department_{{ $department->id }}"
                                                id="department_{{ $department->id }}" value="{{ $department->id }}">
                                            <label class="form-check-label mb-2" for="department_{{ $department->id }}">
                                                <img class="form-check-img"
                                                    src="{{ asset('departments/' . $department->image) }}"
                                                    alt="Image Description">
                                            </label>
                                            <span class="form-check-text">{{ $department->name }}</span>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- End Check -->

                            </div>
                            <!-- End Row -->
                        </div>

                        <hr>
                        <div class="form-group text-end mb-2">
                            <input type="submit" class="btn btn-primary" value="Add new Employee">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
