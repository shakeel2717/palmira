@extends('admin.layout.full')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <!-- Body -->
                <div class="card-body">
                    <div class="mb-4 text-center">
                        <h1>{{ env('APP_DESC') }}</h1>
                        <p class="text-primary">Powered By <b>Technet 055 449 6963</b></p>
                        <h3>{{ now() }}</h3>
                    </div>
                    <div class="row">
                        @forelse ($counters as $counter)
                            <div class="col-md-6">
                                <a class="card card-hover-shadow m-2 bg-primary" href="javascript:;">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="flex-grow-2 ms-4">
                                                <h3 class="text-white mb-1"><span class="display-2">
                                                        {{ $counter->name }}</span></h3>
                                            </div>
                                            @php
                                                $queue = DB::table('tokens')
                                                    ->where('status', '=', 'open')
                                                    ->where('counter_id', $counter->id)
                                                    ->first();
                                            @endphp
                                            @if ($queue != '')
                                                <div class="flex-grow-2 ms-4">
                                                    <h3 class="text-white mb-1">Token:<span class="display-2">
                                                            {{ $queue->token }}</span>
                                                    </h3>
                                                </div>
                                            @else
                                                <div class="flex-grow-2 ms-4">
                                                    <h3 class="text-white mb-1">Token:<span class="display-2">
                                                            ----</span>
                                                    </h3>
                                                </div>
                                            @endif
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
@section('footer')
    <script>
        setInterval(function() {
            location.reload();
        }, 5000);
    </script>
@endsection
