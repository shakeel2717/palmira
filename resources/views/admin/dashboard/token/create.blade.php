@extends('admin.layout.full')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom d-flex align-items-center justify-content-between">
                    <h4 class="card-header-title">{{ env('APP_NAME') }}</h4>
                    <div class="icon">
                        <a href="javascript:;" onclick="toggleFullScreen()"><i class="bi bi-arrows-fullscreen"></i></a>

                    </div>
                </div>

                <!-- Body -->
                <div class="card-body">
                    <div class="mb-4">
                        <p>{{ env('APP_DESC') }} | Powered By <b>Technet 055 449 6963</b></p>
                    </div>

                    <div class="row">
                        @forelse ($departments as $department)
                            <a class="card card-hover-shadow"
                                href="{{ route('admin.token.generate', ['department' => $department->id]) }}">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset('departments/' . $department->image) }}"
                                                alt="Department Image" width="100">
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
    <script>
        // full screen
        function toggleFullScreen() {
            var a = document.documentElement;
            if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement) {
                if (a.requestFullscreen) {
                    a.requestFullscreen();
                } else if (a.mozRequestFullScreen) {
                    a.mozRequestFullScreen();
                } else if (a.webkitRequestFullscreen) {
                    a.webkitRequestFullscreen();
                }
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen();
                }
            }
        }

    </script>

@endsection
