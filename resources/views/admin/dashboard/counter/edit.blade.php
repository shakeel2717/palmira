@extends('admin.layout.app')
@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="page-header-title">Add new Counter</h1>
            </div>
            <!-- End Col -->

            <div class="col-auto">
                <a class="btn btn-primary" href="{{ route('admin.counter.index') }}">
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
                    <form action="{{ route('admin.counter.update',['counter' => $counter->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group text-start mb-2">
                            <label for="name" class="mb-2">Counter Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Counter name"
                                value="{{ $counter->name }}">
                        </div>
                        <div class="form-group text-start mb-2">
                            <label for="description" class="mb-2">Counter Description</label>
                            <input type="text" class="form-control" id="description" name="description"
                                placeholder="Enter Counter Description" value="{{ $counter->description }}">
                        </div>
                        <hr>
                        <div class="form-group text-end mb-2">
                            <input type="submit" class="btn btn-primary" value="Update Counter">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
