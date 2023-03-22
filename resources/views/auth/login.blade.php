@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <h3 class="mt-5 mb-5 fw-bold text-uppercase text-center">Login</h3>

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right title">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right title">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        {{-- <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label> --}}


                                        <div class="checkbox-wrapper-33">
                                            <label class="checkbox" for="remember">
                                                {{-- Input --}}
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox"
                                                    name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <span class="checkbox__symbol">
                                                    <svg aria-hidden="true" class="icon-checkbox" width="28px"
                                                        height="28px" viewBox="0 0 28 28" version="1"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 14l8 7L24 7"></path>
                                                    </svg>
                                                </span>
                                                <p class="checkbox__textwrapper"> {{ __('Remember Me') }}
                                                </p>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <div class="mb-4 row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary doc-btn">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- CHECKBOX STYLE BY https://getcssscan.com/css-checkboxes-examples --}}
    <style>
        .checkbox-wrapper-33 {
            --s-xsmall: 0.625em;
            --s-small: 1.2em;
            --border-width: 1px;
            --c-primary: #259597;
            --c-primary-20-percent-opacity: rgba(37, 149, 151, 20%);
            --c-primary-10-percent-opacity: rgba(37, 149, 151, 20%);
            --t-base: 0.4s;
            --t-fast: 0.2s;
            --e-in: ease-in;
            --e-out: cubic-bezier(.11, .29, .18, .98);
        }

        .checkbox-wrapper-33 .visuallyhidden {
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        .checkbox-wrapper-33 .checkbox {
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .checkbox-wrapper-33 .checkbox+.checkbox {
            margin-top: var(--s-small);
        }

        .checkbox-wrapper-33 .checkbox__symbol {
            display: inline-block;
            display: flex;
            margin-right: calc(var(--s-small) * 0.7);
            border: var(--border-width) solid var(--c-primary);
            position: relative;
            border-radius: 0.1em;
            width: 1.5em;
            height: 1.5em;
            transition: box-shadow var(--t-base) var(--e-out), background-color var(--t-base);
            box-shadow: 0 0 0 0 var(--c-primary-10-percent-opacity);
        }

        .checkbox-wrapper-33 .checkbox__symbol:after {
            content: "";
            position: absolute;
            top: 0.5em;
            left: 0.5em;
            width: 0.25em;
            height: 0.25em;
            background-color: var(--c-primary-20-percent-opacity);
            opacity: 0;
            border-radius: 3em;
            transform: scale(1);
            transform-origin: 50% 50%;
        }

        .checkbox-wrapper-33 .checkbox .icon-checkbox {
            width: 1em;
            height: 1em;
            margin: auto;
            fill: none;
            stroke-width: 3;
            stroke: currentColor;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke-miterlimit: 10;
            color: var(--c-primary);
            display: inline-block;
        }

        .checkbox-wrapper-33 .checkbox .icon-checkbox path {
            transition: stroke-dashoffset var(--t-fast) var(--e-in);
            stroke-dasharray: 30px, 31px;
            stroke-dashoffset: 31px;
        }

        .checkbox-wrapper-33 .checkbox__textwrapper {
            margin: 0;
        }

        .checkbox-wrapper-33 .checkbox__trigger:checked+.checkbox__symbol:after {
            -webkit-animation: ripple-33 1.5s var(--e-out);
            animation: ripple-33 1.5s var(--e-out);
        }

        .checkbox-wrapper-33 .checkbox__trigger:checked+.checkbox__symbol .icon-checkbox path {
            transition: stroke-dashoffset var(--t-base) var(--e-out);
            stroke-dashoffset: 0px;
        }

        .checkbox-wrapper-33 .checkbox__trigger:focus+.checkbox__symbol {
            box-shadow: 0 0 0 0.25em var(--c-primary-20-percent-opacity);
        }

        @-webkit-keyframes ripple-33 {
            from {
                transform: scale(0);
                opacity: 1;
            }

            to {
                opacity: 0;
                transform: scale(20);
            }
        }

        @keyframes ripple-33 {
            from {
                transform: scale(0);
                opacity: 1;
            }

            to {
                opacity: 0;
                transform: scale(20);
            }
        }
    </style>
@endsection
