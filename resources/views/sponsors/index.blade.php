@extends('layouts.app')
@section('content')
<div class="container">
    <div class=" mt-4 p-3 px-lg-0 card rounded-4">
        <h1 class="text-center font-weight-bold mb-5">Choose your Sponsorization Plan</h1>      
        {{-- cards container --}}
        <div class="row g-3 mb-3">
            @foreach ($sponsors as $sponsor) 
            {{-- card --}}
                @if($sponsor->id != 1)
                <div class="col-12 col-lg-4 px-lg-4">
                    <div class="text-center custom-card blue h-100 d-flex flex-column justify-content-between">
                        {{-- title --}}
                        <h2 class="sponsor-type rounded-2 p-1 text-capitalize fw-bold">{{ $sponsor->type }}</h2>
                        
                        <div class="d-flex flex-column justify-content-between h-100">
                            {{-- price --}}
                            <div class="my-4">
                                <div class="fs-2">{{$sponsor->price}} &euro;/month</div>
                                @if ($sponsor->id >= 3)
                                {{-- save --}}
                                <div class="price">
                                    @if ($sponsor->id == 4)
                                    Recommended 
                                    @endif
                                    save 
                                    <span class="price-box discount">
                                        ${{($sponsors[1]->price * ($sponsor->duration / 24)) - $sponsor->price}}
                                    </span>
                                </div>
                                @endif
                            </div>

                            {{-- duration --}}
                            <div class="text-capitalize fs-4 mb-3">duration: {{$sponsor->duration}} hours</div>                           
                        </div>
                        {{-- bottom --}}
                        <div>
                            <a href="{{ route('payment', ['sponsor' => $sponsor]) }}" class="btn doc-btn">Buy now</a>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach  
        </div>

        {{-- button dashboard --}}
        <div class="px-lg-3">
            <a href="{{route('dashboard')}}" class="btn doc-btn">Dashboard</a>
        </div> 
    </div>

</div>
@endsection