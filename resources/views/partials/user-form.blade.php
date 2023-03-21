<form method="POST" action="{{ route($routeName) }}">
    @csrf
    @method($method)

    <h3 class="mt-5 mb-5 fw-bold text-uppercase text-center">{{ $title }}</h3>

    {{-- input row --}}
    <div class="mb-4 row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name*') }}</label>

        <div class="col-md-6">
            <input id="name" type="text"
                class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="mb-4 row">
        <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname*') }}</label>

        <div class="col-md-6">
            <input id="lastname" type="text"
                class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                value="{{ old('lastname', $user->lastname) }}" required autocomplete="lastname" autofocus>

            @error('lastname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="mb-4 row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address*') }}</label>

        <div class="col-md-6">
            <input id="email" type="email"
                class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email', $user->email) }}" required autocomplete="email">

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
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                autocomplete="new-password">
        </div>
    </div>
    {{-- end pw --}}

    @endif


    <div class="mb-4 row">
        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address*') }}</label>

        <div class="col-md-6">
            <input id="address" type="text"
                class="form-control @error('address') is-invalid @enderror" name="address"
                @if ($routeName === 'register')
                value="{{ old('address') }}" 
                @else
                value="{{ old('address', $user->profile->address) }}" 
                @endif
                required autocomplete="address" autofocus>

            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    {{-- specialization --}}
    <label class="col-md-4 col-form-label text-md-right">{{ __('Specializations*') }}</label>
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
                    value="{{ $specialization->id }}" autofocus
                    @if ($errors->any()) @checked(in_array($specialization->id, old('specialization',[])))
                    @else @checked($user->profile->specializations->contains($specialization->id))
                    @endif>
            </div>
        @endforeach
    </div>

    {{-- Button Send --}}
    <div class="mb-4 row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Send') }}
            </button>
        </div>
    </div>
</form>
