@extends('layouts.app')
@section('content')
  
 <div class="container mt-4 pt-3 bg-white border rounded-4">
    <div class="row">
        <h1 class="text-center font-weight-bold mb-5">Choose your Sponsorization Plan</h1>      
        <div class="col-lg-12 d-lg-flex d-md-block justify-content-between">   
                @foreach ($sponsors as $sponsor)             
                    @if($sponsor->id != 1)
                    <div class="col-lg-3 col-md-10 col-sm-9 text-center custom-card blue sponsor-card">
                        <div class="sponsor-type rounded-4 p-1 mb-4">
                            <h2 class="text-capitalize rounded-4  font-weight-bold">{{ $sponsor->type }}</h2>
                        </div>
                        <div>
                           <span class="fs-2">
                            {{$sponsor->price}} &euro;/month
                           </span>
                        </div>
                        <div class="my-3">
                            <span class="text-capitalize fs-4 ">duration:  {{$sponsor->duration}} hours</span> 
                           
                        </div>
                        <button  class="btn btn-primary doc-btn my-3 text-md-center">
                            <a href="Acquista" class="text-white text-decoration-none">Acquista</a>
                        </button>
                    </div>
                    @endif
                
                @endforeach
             
        </div>
    </div>
    <button  class="btn btn-primary doc-btn my-4 ">
        <a href="{{route('dashboard')}}" class="text-white text-decoration-none">Dashboard</a>
    </button>        
</div>
@endsection