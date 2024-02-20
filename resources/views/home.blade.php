@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body d-flex justify-content-center align-items-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('admin.projects.index') }}" class="text-decoration-none">
                        <button class="btn btn-primary m-2">
                            Vai ai progetti
                        </button>
                    </a>
                    <a href="{{ route('admin.types.index') }}" class="text-decoration-none">
                        <button class="btn btn-primary m-2">
                            Vai ai tipi
                        </button>
                    </a>
                    <a href="{{ route('admin.technologies.index') }}" class="text-decoration-none">
                        <button class="btn btn-primary m-2">
                            Vai alle Tecnologie
                        </button>
                    </a>

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
