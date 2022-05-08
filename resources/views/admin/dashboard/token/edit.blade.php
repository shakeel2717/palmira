@extends('admin.layout.app')
@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="page-header-title">Add new Token</h1>
            </div>
            <!-- End Col -->

            <div class="col-auto">
                <a class="btn btn-primary" href="{{ route('admin.token.index') }}">
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
                    <form action="{{ route('admin.token.update', ['token' => $token->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group text-start mb-2">
                            <label for="name" class="mb-2">Department</label>
                            <select name="department_id" id="department_id" class="form-control">
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}"
                                        @if ($department->id == $token->department_id) selected @endif>{{ $department->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group text-start mb-2">
                            <label for="token" class="mb-2">Token</label>
                            <input type="text" class="form-control" id="token" name="token" placeholder="Enter Token"
                                value="{{ $token->token }}">
                        </div>
                        <div class="form-group text-start mb-2">
                            <label for="name" class="mb-2">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group text-end mb-2">
                            <input type="submit" class="btn btn-primary" value="Update Token">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
