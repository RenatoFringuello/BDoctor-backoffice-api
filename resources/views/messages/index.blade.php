<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div class="container p-5">
        <table class="table table-striped">
            <thead class="table">
                <tr>
                    
                    <th scope="col">Name</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Content</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr>
                        <th scope="row">{{$message->id}}</th>
                        <td>{{$message->name}}</td>
                        <td>{{$message->lastname}}</td>
                        <td>{{$message->email}}</td>
                        <td>{{$message->content}}</td>
                        <td>
                            <form action="{{route('messages.destroy', $message->id)}}" method="post" class="d-inline-block form-deleter pt-3">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger"> Delete </button>
                            </form>
                        </td>



                       
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</body>

</html>