@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="card p-3 rounded-4">
            <div class="row g-3 mb-3 pt-3">
                <h1 class="small-title m-0">Messages</h1>
                {{-- messages list --}}
                <div class="col-12 col-lg-5 d-flex flex-column">
                    <div class="custom-card blue h-100">
                        <div class="scroll-index rounded-2">

                            <label class="title mb-2">Messages</label>
                            <ul class="list-group scroller">
                                @foreach ($messages as $key => $message)
                                    <li class="list-group-item py-2">
                                        <a href="{{ route('messages.index', ['key' => $key]) }}"
                                            class="text-black text-decoration-none">
                                            <div class="row">
                                                <div class="col-9 col-sm-10 col-lg-9">
                                                    <div class="text-truncate">{{ $message->name }}</div>
                                                    <pre class="fs-small text-truncate text-pro m-0">{{ $message->email }}</pre>
                                                    <pre class="fs-xsmall text-secondary m-0">{{ $message->created_at->format('h:m') }}</pre>
                                                </div>
                                                <div class="col-3 col-sm-2 col-lg-3 d-flex">
                                                    <form action="{{ route('messages.destroy', $message->id) }}" method="post"
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

                {{-- message picked --}}
                <div class="col-12 col-lg-7 d-flex">
                    <div class="custom-card blue ">
                        <ul class="list-group h-100">
                            @foreach ($messages as $key => $message)
                                @if ($key == $messageSelected)
                                <li class="list-group-item rounded-2 p-3 flex-grow-1">
                                    <div class="d-flex flex-column h-100 justify-content-between">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <div>{{ $message->name }}</div>
                                                <pre class="fs-small text-wrap text-pro mb-1">{{ $message->email }}</pre>
                                                <div class="d-flex">
                                                    <pre class="fs-xsmall text-wrap text-secondary m-0 me-3">{{ \Carbon\Carbon::parse($message->created_at)->format('j F, Y') }}</pre>
                                                    <pre class="fs-xsmall text-wrap text-secondary m-0">{{ $message->created_at->format('h:m') }}</pre>
                                                </div>
                                            </div>
                                            <div>{{ $message->content }}</div>
                                        </div>
                                        <div>
                                            <a href="mailto:{{ $message->email }}" class="btn doc-btn">Reply via Mail</a>
                                        </div>
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
