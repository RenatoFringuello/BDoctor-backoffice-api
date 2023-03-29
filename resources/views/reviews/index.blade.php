@extends('layouts.app')
@section('content')
<div class="container mt-4 pt-4 bg-white border rounded-4">

    <div class="card rounded-4">
        <table class="table">
            <thead class="table">
                <tr>
                    
                    <th scope="col">Name</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Content</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $review)
                <tr>
                    
                    <td>{{$review->name}}</td>
                    <td>{{$review->lastname}}</td>
                    <td>{{$review->email}}</td>
                    <td>{{$review->rating}}</td>
                    <td>{{$review->content}}</td>
                  
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    <button  class="btn btn-primary doc-btn my-3 me-auto">
        <a href="{{route('dashboard')}}" class="text-white text-decoration-none">Dashboard</a>
    </button>
</div>
@endsection    