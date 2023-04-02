@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        @include('partials.profile-form', [
                            'title' => 'Complete your profile',
                            'method' => 'put',
                            'routeName' => 'profile.register.update', //Controller Profile
                            'className' => '',
                            'isRegistered' => true
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
