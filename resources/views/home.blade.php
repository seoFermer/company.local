@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="mb-3">
                            <a href="{{ route('dashboard.company.index') }}" class="btn btn-dark">DASHBOARD</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
