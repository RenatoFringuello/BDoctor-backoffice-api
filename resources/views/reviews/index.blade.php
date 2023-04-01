@extends('layouts.app')
@section('content')
<div class="container mt-4 pt-3 bg-white border rounded-4">
    <div class="row g-3">
        <div class="col-4">
            <div class="custom-card blue">
                <label class="title mb-2">Reviews</label>
                <ul class="list-group">
                    @foreach ($reviews as $key => $review)
                    <li class="list-group-item py-2">
                        <a href="{{route('reviews.index', ['key'=>$key])}}" class="text-black text-decoration-none">
                            <div class="d-flex justify-content-between text-decoration-none">
                                <div class="d-flex flex-column justify-content-center ">
                                    <div>{{ $review->name }}</div>
                                    <pre class="fs-small text-wrap text-secondary m-0">{{ $review->email }}</pre>
                                </div>
                               
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>  
        </div>
        <div class="col-8">
            <div class="custom-card blue">
                <ul class="list-group">
                    @foreach ($reviews as $key => $review)
                    <li class="list-group-item rounded-2 p-3 @if($key != $reviewSelected) d-none @endif">
                        <div class="row text-decoration-none">
                            <div class="col-10">
                                <div>{{ $review->name }}</div>
                                <pre class="fs-small text-wrap text-secondary">{{ $review->email }}</pre>
                                @php
                                    $vote = $review->rating / 2;
                                    $stars = [];
                                    for ($i = 0; $i < 5; $i++) {
                                        if ($vote < 0.8) {
                                            //not full active
                                            if ($vote >= 0.3) {
                                                // 100% half
                                                array_push($stars, 0.5);
                                            } else {
                                                // 100% disabled
                                                array_push($stars, 0);
                                            }
                                        } else {
                                            //100% active
                                            array_push($stars, 1);
                                        }
                                        $vote = $vote - 1;
                                    }
                                @endphp

                                <div class="show_stars d-flex">
                                    @foreach ($stars as $star)
                                        @if ($star === 1)
                                            <div class="star"></div>
                                        @elseif($star === 0.5)
                                            <div class="star half"></div>
                                        @else
                                            <div class="star disabled"></div>
                                        @endif
                                    @endforeach
                                </div>
                               
                            </div>
                            <div class="col-2 d-flex">
                                <div class="availability-dot rounded-circle bg-primary m-auto"></div>
                            </div>
                            <div class="col-12">
                                {{$review->content}}
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>    
        </div>
    </div>
    <button  class="btn btn-primary doc-btn my-3 me-auto">
        <a href="{{route('dashboard')}}" class="text-white text-decoration-none">Dashboard</a>
    </button>        
</div>

@endsection    