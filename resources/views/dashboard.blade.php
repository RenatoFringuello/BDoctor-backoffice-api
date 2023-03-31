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
                                <div class="row gx-2 mt-2">
                                    <div class="col-12 col-sm-5">
                                        {{-- img --}}
                                        <img class="img-fluid rounded-circle p-2"
                                            @if (!str_starts_with(Auth::user()->profile->picture, 'http')) 
                                                src="{{asset('storage' . Auth::user()->profile->picture)}}"
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
                                            <pre class="mb-2">{{Auth::user()->email}}</pre>
                                            <div>{{Auth::user()->profile->address}}</div>
                                            <div class="mb-2">{{Auth::user()->profile->telephone}}</div>
                                            {{-- toggle isActive --}}
                                            @include('partials.user-form', [
                                                'user' => Auth::user(),
                                                'button' => (Auth::user()->isActive == 0) ? 'Set to Available' : 'Set to Unavailable',
                                                'method' => 'put',
                                                'routeName' => 'profile.update',
                                                'className' => ''
                                            ])
                                            {{-- end form --}}
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="p-2">
                                            @if (isset(Auth::user()->profile->bio))
                                            <div class="mb-2 fs-5">Bio</div>
                                            <p class="card text-dark p-2">{{Auth::user()->profile->bio}}</p>
                                            @endif

                                            @if (isset(Auth::user()->profile->services))
                                            <div class="mb-2 fs-5">Services</div>
                                            <p class="card text-dark m-0 p-2">{{Auth::user()->profile->services}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- feedback and stats --}}
                        <div class="col-12 col-lg-8">
                            <div class="row g-3">
                                <div class="col-12 text-center my-3">
                                    <a href="{{route('sponsors.index')}}" class="btn-sponsor">Choose your Premium account</a>                                    
                                </div>
                                @if (count($messages) != 0)
                                <div class="col-6">
                                    <a href="{{route('messages.index')}}" class="btn doc-btn text-decoration-none text-white w-100">
                                        <label for="" class="title">You have {{count($messages)}} messages</label>
                                    </a>
                                </div>
                                @endif
                                @if (count($reviews) != 0)
                                <div class="col-6">
                                    <a href="{{route('reviews.index')}}" class="btn doc-btn me-auto text-decoration-none text-white w-100">
                                        <label class="title">You have {{count($reviews)}} reviews</label>
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
