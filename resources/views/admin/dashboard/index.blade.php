@extends('admin.layout.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-header-title">{{ env('APP_NAME') }}</h4>
                </div>

                <!-- Body -->
                <div class="card-body">
                    <div class="mb-4">
                        <p>{{ env('APP_DESC') }}</p>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2">Total Employees</h6>

                                    <div class="row align-items-center gx-2">
                                        <div class="col">
                                            <span class="js-counter display-4 text-dark"
                                                data-value="{{ $employees->count() }}">{{ $employees->count() }}</span>
                                        </div>
                                        <!-- End Col -->
                                    </div>
                                    <!-- End Row -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2">Total Departments</h6>

                                    <div class="row align-items-center gx-2">
                                        <div class="col">
                                            <span class="js-counter display-4 text-dark"
                                                data-value="{{ $departments->count() }}">{{ $departments->count() }}</span>
                                        </div>
                                        <!-- End Col -->
                                    </div>
                                    <!-- End Row -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2">Total Token</h6>

                                    <div class="row align-items-center gx-2">
                                        <div class="col">
                                            <span class="js-counter display-4 text-dark">{{ $tokens->count() }}</span>
                                        </div>
                                        <!-- End Col -->
                                    </div>
                                    <!-- End Row -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2">Open Token</h6>

                                    <div class="row align-items-center gx-2">
                                        <div class="col">
                                            <span class="js-counter display-4 text-dark">{{ $tokens->where('status','open')->count() }}</span>
                                        </div>
                                        <!-- End Col -->
                                    </div>
                                    <!-- End Row -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2">Total Counter</h6>

                                    <div class="row align-items-center gx-2">
                                        <div class="col">
                                            <span class="js-counter display-4 text-dark">{{ $counters->where('status','active')->count() }}</span>
                                        </div>
                                        <!-- End Col -->
                                    </div>
                                    <!-- End Row -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
