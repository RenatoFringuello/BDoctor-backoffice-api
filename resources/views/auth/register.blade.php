@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        {{-- form --}}
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <h3 class="mt-5 mb-5 fw-bold text-uppercase text-center">Let's Create Your Profile</h3>

                            {{-- input row --}}
                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Name*') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="lastname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Lastname*') }}</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text"
                                        class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                        value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address*') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Address*') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address" autofocus>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- specialization --}}
                            <label class="col-md-4 col-form-label text-md-right mb-3">{{ __('Specializations*') }}</label>
                            <div class="mb-4 row">
                                @error('specializations')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @foreach ($specializations as $specialization)
                                    <div class="col-6">
                                        <label for="{{ $specialization->name }}"
                                            class="text-capitalize text-md-right">{{ __($specialization->name) }}</label>
                                        <input id="{{ $specialization->name }}" type="checkbox" name="specializations[]"
                                            value="{{ $specialization->id }}" class="mb-3"
                                            @if ($errors->any()) @checked(in_array($specialization->id, old('specialization',[]))) @endif
                                            autofocus>
                                    </div>
                                @endforeach
                            </div>

                            <hr>
                            <h3 class="mt-5 mb-5 fw-bold text-uppercase text-center">Completa i dati del tuo profilo</h3>

                            {{-- Picture --}}
                            <div class="mb-4 row">
                                <label for="picture"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Add Picture') }}</label>

                                <div class="col-md-6">
                                    <input id="picture" type="file"
                                        class="form-control @error('picture') is-invalid @enderror" name="picture"
                                        value="{{ old('picture') }}" autocomplete="picture" autofocus>

                                    @error('picture')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Bio --}}
                            <div class="mb-4 row form-floating">

                                <div class="col-md-12">
                                    <textarea class="form-control @error('bio') is-invalid @enderror" name="bio" value="{{ old('bio') }}"
                                        autocomplete="bio" autofocus cols="30" rows="10" placeholder="Inser Your Bio"></textarea>

                                    @error('bio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Services --}}
                            <div class="mb-4 row form-floating">

                                <div class="col-md-12">
                                    <textarea class="form-control @error('service') is-invalid @enderror" name="service" value="{{ old('service') }}"
                                        autocomplete="service" autofocus cols="30" rows="10" placeholder="Inser Your Service"></textarea>

                                    @error('service')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Telephone --}}
                            <div class="mb-4 row">
                                <label for="telephone"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Telephone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="telephone" type="text"
                                        class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                                        value="{{ old('telephone') }}" autocomplete="telephone" autofocus>

                                    @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Curriculum --}}
                            <div class="mb-4 row">
                                <label for="curriculum"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Add Curriculum') }}</label>

                                <div class="col-md-6">
                                    <input id="curriculum" type="file"
                                        class="form-control @error('curriculum') is-invalid @enderror" name="curriculum"
                                        value="{{ old('curriculum') }}" autocomplete="curriculum" autofocus>

                                    @error('curriculum')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Button Send --}}
                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        {{-- end form --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
