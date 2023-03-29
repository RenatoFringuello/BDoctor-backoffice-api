<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree\Gateway as Braintree_Gateway;

class BraintreeController extends Controller
{
    public function token(Request $request)
    {

        $gateway = new Braintree_Gateway([
            'environment' => 'sandbox',
            'merchantId' => '3xb8y75mrh9cyy98',
            'publicKey' => '6d4ndqxfvsv44d79',
            'privateKey' => 'b47e33f64c39986020d76aaabbcce82d'
        ]);
        $clientToken = $gateway->clientToken()->generate();
        return view('braintree', ['token' => $clientToken]);
    }
}
