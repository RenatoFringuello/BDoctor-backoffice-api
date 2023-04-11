@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col py-4">
                <div class="card rounded-4">
                    <div class="card-body">
                        <h2 class="small-title">Dashboard</h2>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="mb-3 text-uppercase fs-3">
                            {{ __('Welcome back ' . Auth::user()->name) }}
                        </div>
                        <div class="row g-3">
                            {{-- profile --}}
                            <div class="col-12 col-lg-4">
                                <div class="custom-card blue position-relative">
                                    @if (Auth::user()->sponsors->first()->id != 1)
                                        <div class="sponsored-icon position-absolute top-0 end-0 m-2">
                                            <i class="fa-solid fa-certificate fs-3 text-warning"></i>
                                        </div>
                                    @endif
                                    <div class="row gx-2 mt-2">
                                        <div class="col-12 col-sm-5">
                                            {{-- img --}}
                                            <img class="dashboard-picture"
                                                @if (!str_starts_with(Auth::user()->profile->picture, 'http')) src="{{ asset('storage/' . Auth::user()->profile->picture) }}"
                                            @else 
                                                src="{{ Auth::user()->profile->picture }}" @endif
                                                alt="{{ Auth::user()->name . '\'s picture imgs' }}">
                                            {{-- end img --}}
                                        </div>
                                        <div class="col-12 col-sm-7">
                                            <div class="p-2 p-lg-0 pe-lg-2">
                                                <span class="fs-5">{{ Auth::user()->name }}</span>
                                                <span class="fs-5">{{ Auth::user()->lastname }}</span>
                                                <span
                                                    class="availability-dot rounded-circle @if (Auth::user()->isActive) bg-available @else bg-unavailable @endif"
                                                    title="@if (Auth::user()->isActive) Available @else Unavailable @endif"></span>
                                                <pre class="mb-2">{{ Auth::user()->email }}</pre>
                                                <div>{{ Auth::user()->profile->address }}</div>
                                                <div class="mb-2">{{ Auth::user()->profile->telephone }}</div>
                                                {{-- toggle isActive --}}
                                                @include('partials.user-form', [
                                                    'user' => Auth::user(),
                                                    'button' =>
                                                        Auth::user()->isActive == 0
                                                            ? 'Set to Available'
                                                            : 'Set to Unavailable',
                                                    'method' => 'put',
                                                    'routeName' => 'profile.update',
                                                    'className' => '',
                                                ])
                                                {{-- end form --}}
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="p-2">
                                                @if (isset(Auth::user()->profile->bio))
                                                    <div class="mb-2 fs-5">Biograph</div>
                                                    <p class="card text-dark p-2">{{ Auth::user()->profile->bio }}</p>
                                                @endif

                                                @if (isset(Auth::user()->profile->services))
                                                    <div class="mb-2 fs-5">Services </div>
                                                    <p class="card text-dark m-0 p-2">
                                                        {{ Auth::user()->profile->services }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- feedback and stats --}}
                            <div class="col-12 col-lg-8">
                                <div class="row g-3">
                                    {{-- become a premium btn --}}
                                    @if (Auth::user()->sponsors->first()->id == 1)
                                        <div class="col-12 text-center">
                                            <a href="{{ route('sponsors.index') }}"
                                                class="btn doc-btn bg-sponsor d-inline-block w-100 p-3">Choose your Premium
                                                account</a>
                                        </div>
                                    @endif

                                    {{-- messages button --}}
                                    <div class="col-6">
                                        <a @if (count($messages) != 0)href="{{ route('messages.index') }}"@endif
                                            class="@if (count($messages) != 0) doc-btn @else btn-secondary @endif btn me-auto text-decoration-none w-100 title">
                                            You have {{ count($messages) }} messages
                                        </a>
                                    </div>
                                    {{-- reviews button --}}
                                    <div class="col-6">
                                        <a @if (count($reviews) != 0)href="{{ route('reviews.index') }}"@endif
                                            class="@if (count($reviews) != 0) doc-btn @else btn-secondary @endif btn me-auto text-decoration-none w-100 title">
                                            You have {{ count($reviews) }} reviews
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
