@extends('layouts.app')

@section('content')
    <script src="https://js.braintreegateway.com/web/dropin/1.34.0/js/dropin.min.js"></script>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5 m-auto card mt-3 p-3">
                <h2 class="title">Cart</h2>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between">
                        <div>
                            {{$sponsor->type}}
                        </div>
                        <div class="price">
                            ${{$sponsor->price}}
                        </div>
                    </li>
                </ul>
                <p class="m-0">Insert your credit/debit card info to proceed with the payment</p>
                <form id="payment-form" action="{{route('payment.process',['paymentStatus' => true, 'sponsor'=> $sponsor])}}" method="POST">
                    @csrf
                    <!-- Putting the empty container you plan to pass to
                    `braintree.dropin.create` inside a form will make layout and flow
                    easier to manage -->
                    <div id="dropin-container"></div>
                    <input class="btn doc-btn" type="submit" />
                    <input type="hidden" id="nonce" name="payment_method_nonce" />
                </form>
            </div>

            <script>
                const form = document.getElementById('payment-form');
                braintree.dropin.create({
                    authorization: {!! json_encode($token) !!},
                    container: '#dropin-container'
                }, (error, dropinInstance) => {
                    if (error) console.error(error);
                    
                    // è un reindirizzamento a un form di selezione delle carte salvate
                    // form.addEventListener('submit', event => {
                    //     event.preventDefault();
                        
                    //     dropinInstance.requestPaymentMethod((error, payload) => {
                    //         if (error) console.error(error);
                            
                    //         document.getElementById('nonce').value = payload.nonce;

                    //         setTimeout(() => {
                    //             form.submit();
                    //         }, 44000);
                    //     });
                    // });
                });
            </script>
        </div>
    </div>
@endsection