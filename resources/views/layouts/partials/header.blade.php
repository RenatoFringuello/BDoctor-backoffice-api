<header>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <div>
                {{-- the link must be changed on deploy --}}
                <a class="navbar-brand" href="http://localhost:5173/">
                    <img src="{{ asset('assets/B-Doc-Logo.png') }}" alt="Main Logo" class="w-25">
                </a>
                <a href="{{ env('LINK_APP_FRONTEND') }}"
                    class="nav-item text-decoration-none text-dark d-none d-md-inline">Home</a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    {{-- add link in header --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{url('/') }}">{{ __('Home') }}</a>
                    </li> --}}
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a href="{{ env('LINK_APP_FRONTEND') }}"
                                class="nav-link text-decoration-none text-dark d-inline d-md-none">Home</a>
                        <li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                {{-- User Pictures --}}
                                @if (Route::currentRouteName() != 'profile.register')
                                    <img class="user-icon"
                                        @if (!str_starts_with(Auth::user()->profile->picture, 'http')) src="{{ asset('storage/' . Auth::user()->profile->picture) }}"
                                    @else                     
                                    src="{{ Auth::user()->profile->picture }}" @endif
                                        alt="{{ Auth::user()->name . '\'s picture imgs' }}">
                                @endif
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ url('dashboard') }}">
                                    <span>
                                        <i class="fa-solid fa-house"></i>
                                    </span>
                                    {{ __('Dashboard') }}
                                </a>
                                <a class="dropdown-item" href="{{ url('profile') }}">
                                    <span>
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                    {{ __('Profile') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('messages.index') }}">
                                    <span>
                                        <i class="fa-solid fa-comment"></i>
                                    </span>
                                    {{ __('Message') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('reviews.index') }}">
                                    <span>
                                        <i class="fa-solid fa-star"></i>
                                    </span>
                                    {{ __('Review') }}
                                </a>
                                @if (Auth::user()->sponsors->first()->id == 1)
                                    <a class="dropdown-item" href="{{ route('sponsors.index') }}">
                                        <span>
                                            <i class="fa-solid fa-certificate text-warning"></i>
                                        </span>
                                        {{ __('Sponsors') }}
                                    </a>
                                @endif
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <span>
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                    </span>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>

                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
