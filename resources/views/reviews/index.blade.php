@extends('layouts.app')
@section('content')
    <div class="container mt-4 pt-3 bg-white border rounded-4">

        <h1 class="text-center mb-4 text-uppercase">Reviews</h1>

        <div class="row g-3">
            {{-- Show Review For Smartphone & Tablet --}}
            <div class="col-12 col-lg-8 d-block d-lg-none">
                <div class="custom-card blue">
                    <ul class="list-group">
                        @foreach ($reviews as $key => $review)
                            <li class="list-group-item rounded-2 p-3 @if ($key != $reviewSelected) d-none @endif">
                                <div class="row text-decoration-none">
                                    <div class="col-10">
                                        <div>{{ $review->name }}</div>
                                        <pre class="fs-small text-wrap text-secondary">{{ $review->email }}</pre>
                                        <div>{{ $review->rating }}</div>
                                    </div>
                                    <div class="col-2 d-flex">
                                        <div class="availability-dot rounded-circle bg-primary m-auto"></div>
                                    </div>
                                    <div class="col-12">
                                        {{ $review->content }}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-12 col-lg-4 overflow-hidden">
                <div class="custom-card blue h-75 overflow-hidden">
                    <div class="scroll-index h-100">
                        <label class="title mb-2">Reviews</label>
                        <ul class="list-group">
                            @foreach ($reviews as $key => $review)
                                <li class="list-group-item py-2">
                                    <a href="{{ route('reviews.index', ['key' => $key]) }}"
                                        class="text-black text-decoration-none">
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
            </div>

            {{-- Show Review For Desktop --}}
            <div class="col-12 col-lg-8 d-none d-lg-block">
                <div class="custom-card blue">
                    <ul class="list-group">
                        @foreach ($reviews as $key => $review)
                            <li class="list-group-item rounded-2 p-3 @if ($key != $reviewSelected) d-none @endif">
                                <div class="row text-decoration-none">
                                    <div class="col-10">
                                        <div>{{ $review->name }}</div>
                                        <pre class="fs-small text-wrap text-secondary">{{ $review->email }}</pre>
                                        <div>{{ $review->rating }}</div>
                                    </div>
                                    <div class="col-2 d-flex">
                                        <div class="availability-dot rounded-circle bg-primary m-auto"></div>
                                    </div>
                                    <div class="col-12">
                                        {{ $review->content }}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <button class="btn btn-primary doc-btn my-3 me-auto">
            <a href="{{ route('dashboard') }}" class="text-white text-decoration-none">Dashboard</a>
        </button>
    </div>
@endsection
