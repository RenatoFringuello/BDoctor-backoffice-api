<form method="POST" action="{{ route($routeName, $user->profile) }}" enctype="multipart/form-data">
    @csrf
    @method($method)

    <h3 class="mt-5 mb-5 fw-bold text-uppercase text-center">{{ $title }}</h3>

    {{-- Picture --}}
    <div class="mb-4 row">
        <label for="picture" class="col-md-4 col-form-label text-md-right">{{ __('Add Picture') }}</label>

        <div class="col-md-6">
            <input id="picture" type="file" class="form-control @error('picture') is-invalid @enderror"
                name="picture" value="{{ old('picture', $user->profile->picture) }}" autocomplete="picture" autofocus>

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
            <textarea class="form-control @error('bio') is-invalid @enderror" name="bio"
                autocomplete="bio" autofocus cols="30" rows="10" placeholder="Inser Your Bio">{{ old('bio', $user->profile->bio) }}</textarea>

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
            <textarea class="form-control @error('services') is-invalid @enderror" name="services" 
                autocomplete="services" autofocus cols="30" rows="10" placeholder="Inser Your Service">{{ old('services', $user->profile->services) }}</textarea>

            @error('services')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    {{-- Telephone --}}
    <div class="mb-4 row">
        <label for="telephone" class="col-md-4 col-form-label text-md-right">{{ __('Telephone Number') }}</label>

        <div class="col-md-6">
            <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror"
                name="telephone" value="{{ old('telephone',$user->profile->telephone) }}" autocomplete="telephone" autofocus>

            @error('telephone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    {{-- Curriculum --}}
    <div class="mb-4 row">
        <label for="curriculum" class="col-md-4 col-form-label text-md-right">{{ __('Add Curriculum') }}</label>

        <div class="col-md-6">
            <input id="curriculum" type="file" class="form-control @error('curriculum') is-invalid @enderror"
                name="curriculum" value="{{ old('curriculum',$user->profile->curriculum) }}" autocomplete="curriculum" autofocus>

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
                {{ __('Send') }}
            </button>
        </div>
    </div>
</form>
