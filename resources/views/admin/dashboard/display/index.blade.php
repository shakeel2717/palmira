@extends('admin.layout.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h1 class="card-header-title text-center">Display 01, Counter Wise Queue 1</h1>
                </div>

                <!-- Body -->
                <div class="card-body">
                    <div class="mb-4 text-center">
                        <h3>{{ env('APP_DESC') }}</h3>
                        <h3>{{ now() }}</h3>
                    </div>
                    <hr>
                    <div class="row">
                        @forelse ($counters as $counter)
                            <div class="col-md-6">
                                <a class="card card-hover-shadow m-2 bg-primary" href="javascript:;">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="flex-grow-2 ms-4">
                                                <h3 class="text-white mb-1">Counter: {{ $counter->name }}</h3>
                                            </div>
                                            <div class="flex-grow-2 ms-4">
                                                <h3 class="text-white mb-1">Token: </h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <a class="card card-hover-shadow" href="javascript:;">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img class="avatar avatar-lg avatar-4x3"
                                                    src="/assets/svg/illustrations/oc-megaphone.svg" alt="Image Description"
                                                    style="min-height: 5rem;">
                                            </div>

                                            <div class="flex-grow-1 ms-4">
                                                <h3 class="text-inherit mb-1">No Counter Found in System</h3>
                                                <span class="text-body">Please add Counter and then Generate
                                                    Token</span>
                                            </div>

                                            <div class="ms-2 text-end">
                                                <i class="bi-chevron-right text-body text-inherit"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
