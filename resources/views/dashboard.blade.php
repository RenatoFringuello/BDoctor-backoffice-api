@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col pt-4">
            <div class="card rounded-4">
                <div class="card-body">
                    <h2>Dashboard</h2>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="mb-3">
                        {{ __('Welcome back '. Auth::user()->name) }}
                    </div>
                    <div class="row g-3">
                        {{-- profile --}}
                        <div class="col-12 col-lg-4">
                            <div class="custom-card blue">
                                <div>
                                    <label class="title mb-2">Profile</label>
                                </div>
                                <div class="row gx-2">
                                    <div class="col-12 col-sm-5">
                                        {{-- img --}}
                                        <img class="img-fluid rounded-circle p-2"
                                            @if (!str_starts_with(Auth::user()->profile->picture, 'http')) 
                                                src="{{asset('storage/' . Auth::user()->profile->picture)}}"
                                            @else 
                                                src="{{ Auth::user()->profile->picture }}"
                                            @endif
                                        alt="{{Auth::user()->name . '\'s picture imgs'}}">
                                        {{-- end img --}}
                                    </div>
                                    <div class="col-12 col-sm-7">
                                        <div class="p-2 p-lg-0 pe-lg-2">
                                            <span class="fs-5">{{Auth::user()->name}}</span>
                                            <span class="fs-5">{{Auth::user()->lastname}}</span>
                                            <span class="availability-dot rounded-circle @if(Auth::user()->isActive) bg-available @else bg-unavailable @endif" 
                                                    title="@if(Auth::user()->isActive) Available @else Unavailable @endif"></span>
                                            <pre class="mb-3">{{Auth::user()->email}}</pre>
                                            {{-- toggle isActive --}}
                                            @include('partials.user-form', [
                                                'user' => Auth::user(),
                                                'button' => (Auth::user()->isActive == 0) ? 'Set to Available' : 'Set to Unavailable',
                                                'method' => 'put',
                                                'routeName' => 'profile.update',
                                            ])
                                            {{-- end form --}}
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p class="p-2">{{Auth::user()->profile->bio}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- feedback and stats --}}
                        <div class="col-12 col-lg-8">
                            <div class="row g-3">
                                <div class="col-12 col-md-4">
                                    <div class="custom-card blue">
                                        <label class="title mb-2">Messages</label>
                                        <ul class="list-group">
                                            <li class="list-group-item">item</li>
                                            <li class="list-group-item">item</li>
                                            <li class="list-group-item">item</li>
                                            <li class="list-group-item">item</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="custom-card cyan">
                                        <label class="title mb-2">Reviews</label>
                                        <ul class="list-group">
                                            <li class="list-group-item">item</li>
                                            <li class="list-group-item">item</li>
                                            <li class="list-group-item">item</li>
                                            <li class="list-group-item">item</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
