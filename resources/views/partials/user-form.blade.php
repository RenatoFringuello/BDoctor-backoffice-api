<form method="POST" action="{{ route($routeName) }}" id="form">
    @csrf
    @method($method)

    @if (isset($specializations))
        
    <h3 class="mt-5 mb-5 fw-bold text-uppercase text-center">{{ $title }}</h3>

    {{-- input row --}}
    <div class="mb-4 row">
        <label for="name" class="col-md-4 col-form-label text-md-right title">{{ __('Name*') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name', $user->name) }}" required minlength="2" maxlength="255"  autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="mb-4 row">
        <label for="lastname" class="col-md-4 col-form-label text-md-right title">{{ __('Lastname*') }}</label>

        <div class="col-md-6">
            <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror"
                name="lastname" value="{{ old('lastname', $user->lastname) }}" required minlength="2" maxlength="255" autocomplete="lastname" autofocus>

            @error('lastname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="mb-4 row">
        <label for="email" class="col-md-4 col-form-label text-md-right title">{{ __('E-Mail Address*') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                name="email" value="{{ old('email', $user->email) }}" required maxlength="255" autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    @if ($routeName === 'register')
        {{-- pw --}}
        <div class="mb-4 row">
            <label for="password" class="col-md-4 col-form-label text-md-right title">{{ __('Password*') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" autocomplete="new-password" required minlength="8" >

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="mb-4 row">
            <label for="password-confirm"
                class="col-md-4 col-form-label text-md-right title">{{ __('Confirm Password*') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                    autocomplete="new-password" required minlength="8">
            </div>
        </div>
        {{-- end pw --}}
    @endif


    <div class="mb-4 row">
        <label for="address" class="col-md-4 col-form-label text-md-right title">{{ __('Address*') }}</label>

        <div class="col-md-6">
            <input id="address" type="text" class="form-control input @error('address') is-invalid @enderror"
                name="address"
                @if ($routeName === 'register') value="{{ old('address') }}" 
                @else
                value="{{ old('address', $user->profile->address) }}" @endif
                autocomplete="address" autofocus>

            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    {{-- specialization --}}
    <label class="col-md-4 col-form-label text-md-right title mb-3">{{ __('Specializations*') }}</label>
    <div class="mb-4 row">
        @error('specializations')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        @foreach ($specializations as $specialization)
            <div class="col-6 mb-2">
                <div class="checkbox-wrapper-33">
                    <label class="checkbox" for="{{ $specialization->name }}">
                        {{-- Input --}}
                        <input class="checkbox__trigger visuallyhidden"  type="checkbox"
                            id="{{ $specialization->name }}" name="specializations[]"
                            value="{{ $specialization->id }}" autofocus
                            @if ($errors->any()) @checked(in_array($specialization->id, old('specialization',[])))
                            {{-- checked true = $user->profile->specializations != null --}}
                            @else @checked(isset($user->profile->specializations) ? $user->profile->specializations->contains($specialization->id) : false) @endif>

                        <span class="checkbox__symbol">
                            <svg aria-hidden="true" class="icon-checkbox" width="28px" height="28px"
                                viewBox="0 0 28 28" version="1" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 14l8 7L24 7"></path>
                            </svg>
                        </span>
                        <p class="checkbox__textwrapper">{{ __($specialization->name) }}</p>
                    </label>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Button Send --}}
    <div class="mb-4 row mb-0">
        <div class="text-end me-5">
            <button type="submit" class="btn doc-btn" id="send">
                {{ __('Send') }}
            </button>
        </div>
    </div>

    @else
        {{-- Button --}}
        {{-- that's to avoid the validated --}}
        <input type="hidden" name="address" value="{{$user->profile->address}}">
        <input type="hidden" name="lastname" value="{{$user->lastname}}">
        @foreach ($user->profile->specializations as  $specialization)
            <input type="hidden" name="specializations[]" value="{{$specialization->id}}">
        @endforeach

        @if ($user->isActive)
            <input type="hidden" name="isActive" value="0">
            <button type="submit" class="btn doc-btn bg-unavailable fs-small w-100">
                {{ __('Set to Unavailable') }}
            </button>
        @else
            <input type="hidden" name="isActive" value="1">
            <button type="submit" class="btn doc-btn bg-available fs-small w-100">
                {{ __('Set to Available') }}
            </button>
        @endif

    @endif
</form>