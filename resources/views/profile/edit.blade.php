@extends('layouts.app')
@section('content')
    <div class="container my-4">
        <div class="card p-4 mb-4 bg-white shadow rounded-lg">

            @include('partials.user-form', [
                'user' => $user,
                'specializations' => $specializations,
                'title' => 'Edit Doctor\'s info',
                'method' => 'put',
                'routeName' => 'profile.update',
                'className' => 'hasPassword hasCheckbox'
            ])

        </div>

        <div class="card p-4 mb-4 bg-white shadow rounded-lg">

            @include('partials.profile-form', [
                'title' => 'Edit other info',
                'method' => 'put',
                'routeName' => 'profile.register.update', //lo mando in profile.register.update perchè fa le stesse cose del register
                'className' => '',
                'isRegistered' => false
            ])

        </div>

        <div class="card p-4 mb-4 bg-white shadow rounded-lg">
            @include('profile.partials.update-password-form')
        </div>

        <div class="card p-4 mb-4 bg-white shadow rounded-lg">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
@endsection
