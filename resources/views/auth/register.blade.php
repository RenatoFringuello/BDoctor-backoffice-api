@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        @include('partials.user-form', ['specializations'=>$specializations, 'title'=>'Register', 'method'=>'post', 'routeName'=>'register'])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
