@extends('layouts.app')
@section('content')
<div class="container mt-4 pt-3 bg-white border rounded-4">
    <div class="row g-3">
        <div class="col-4">
            <div class="custom-card blue">
                <label class="title mb-2">Messages</label>
                <ul class="list-group">
                    @foreach ($messages as $key => $message)
                    <li class="list-group-item py-2">
                        <a href="{{route('messages.index', ['key'=>$key])}}" class="text-black text-decoration-none">
                            <div class="d-flex justify-content-between text-decoration-none">
                                <div class="d-flex flex-column justify-content-center ">
                                    <div>{{ $message->name }}</div>
                                    <pre class="fs-small text-wrap text-secondary m-0">{{ $message->email }}</pre>
                                </div>
                                <div class="d-flex">
                                    <form action="{{route('messages.destroy', $message->id)}}" method="post" class="d-flex form-deleter">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button type="submit" class="btn btn-danger m-auto"> Delete </button>
                                    </form>
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
                    @foreach ($messages as $key => $message)
                    <li class="list-group-item rounded-2 p-3 @if($key != $messageSelected) d-none @endif">
                        <div class="row text-decoration-none">
                            <div class="col-10">
                                <div>{{ $message->name }}</div>
                                <pre class="fs-small text-wrap text-secondary">{{ $message->email }}</pre>
                            </div>
                            <div class="col-2 d-flex">
                                <div class="availability-dot rounded-circle bg-primary m-auto"></div>
                            </div>
                            <div class="col-12">
                                {{$message->content}}
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


