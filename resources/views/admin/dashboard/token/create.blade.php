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
                        @forelse ($departments as $department)
                            <a class="card card-hover-shadow" href="{{ route('admin.token.generate',['department' => $department->id]) }}">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset('departments/'.$department->image) }}" alt="Department Image" width="100">
                                        </div>

                                        <div class="flex-grow-1 ms-4">
                                            <h3 class="text-inherit mb-1">{{ $department->name }}</h3>
                                            <span class="text-body">{{ $department->description }}</span>
                                        </div>

                                        <div class="ms-2 text-end">
                                            <i class="bi-chevron-right text-body text-inherit"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="col-md-4">
                                <div class="card h-100 bg-primary">
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-2 text-white">No Department Found</h6>
                                    </div>
                                </div>
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
