@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="card p-3 rounded-4">
            <div class="row g-3 mb-3 pt-3">
                <h1 class="small-title m-0">reviews</h1>
                {{-- reviews list --}}
                <div class="col-12 col-lg-5 d-flex flex-column">
                    <div class="custom-card blue h-100">
                        <div class="scroll-index rounded-2">
                            <label class="title mb-2">reviews</label>
                            <ul class="list-group scroller">
                                @foreach ($reviews as $key => $review)
                                    <li class="list-group-item py-2">
                                        <a href="{{ route('reviews.index', ['key' => $key]) }}"
                                            class="text-black text-decoration-none">
                                            <div class="row">
                                                <div class="col-9 col-sm-10 col-lg-9">
                                                    <div class="text-truncate">{{ $review->name }}</div>
                                                    <pre class="fs-small text-truncate text-pro m-0">{{ $review->email }}</pre>
                                                    <pre class="fs-xsmall text-secondary m-0">{{ $review->created_at->format('h:m') }}</pre>
                                                </div>
                                                <div class="col-3 col-sm-2 col-lg-3 d-flex">
                                                    <form action="{{ route('reviews.destroy', $review->id) }}" method="post"
                                                        class="d-flex form-deleter me-0 ms-auto">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger me-0 ms-auto my-auto">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- review picked --}}
                <div class="col-12 col-lg-7 d-flex">
                    <div class="custom-card blue ">
                        <ul class="list-group h-100">
                            @foreach ($reviews as $key => $review)
                                @if ($key == $reviewSelected)
                                <li class="list-group-item rounded-2 p-3 flex-grow-1">
                                    <div class="d-flex flex-column h-100 justify-content-between">
                                        <div class="mb-3">
                                            <div>{{ $review->name }}</div>
                                            <pre class="fs-small text-wrap text-pro mb-1">{{ $review->email }}</pre>
                                            <div class="d-flex mb-3">
                                                <pre class="fs-xsmall text-wrap text-secondary m-0 me-3">{{ \Carbon\Carbon::parse($review->created_at)->format('j F, Y') }}</pre>
                                                <pre class="fs-xsmall text-wrap text-secondary m-0">{{ $review->created_at->format('h:m') }}</pre>
                                            </div>
                                            {{-- stars --}}
                                            <div>
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
                                        </div>
                                        <div>{{ $review->content }}</div>
                                    </div>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary doc-btn me-auto">
                <a href="{{ route('dashboard') }}" class="text-white text-decoration-none">Dashboard</a>
            </button>
        </div>
    </div>
@endsection
