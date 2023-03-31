@extends('layouts.app')

@section('content')
    <div class="row">
        @include('braintree', compact('sponsor'))
    </div>
    </div>
@endsection
