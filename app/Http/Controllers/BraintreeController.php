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
            'publicKey' => 'hmk35pf9y73mhr22',
            'privateKey' => '6743c0d02106c81481dac2a90458c7d7'
        ]);
        $clientToken = $gateway->clientToken()->generate();
        return view('braintree', ['token' => $clientToken]);
    }
}
