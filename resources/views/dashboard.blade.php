@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col pt-4">
            <div class="card">
                {{-- <div class="card-header">{{ __('User Dashboard') }}</div> --}}

                <div class="card-body">
                    <h2>Dashboard</h2>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Welcome back '. Auth::user()->name) }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
