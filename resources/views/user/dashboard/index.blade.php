@extends('user.layout.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-header-title">{{ auth()->user()->name }} & Counter #{{ auth()->user()->counter }}
                    </h4>
                </div>
                <div class="card-body text-center">
                    @if (getActiveToken())
                    <div class="mb-4">
                        <h1>Currect Token: <b class="text-primary">{{ getActiveToken()->token ?? 'No Token Yet' }}</b>
                        </h1>
                    </div>
                    <div class="mb-4">
                        <a href="{{ route('user.token.edit',['token' => getActiveToken()->id]) }}" class="btn btn-lg btn-primary">Mark as Complete</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
