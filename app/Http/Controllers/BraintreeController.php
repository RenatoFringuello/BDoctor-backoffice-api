<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Braintree\Gateway as Braintree_Gateway;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
        $sponsor = Sponsor::findOrFail($request->sponsor);
        return view('braintree', ['token' => $clientToken, 'sponsor' => $sponsor]);
    }

    public function process(Request $request)
    {
        //pagamento avvenuto con successo
        Auth::user()->sponsors()->sync([$request->sponsor]);
        // dd(Auth::user()->sponsors);
        return Redirect::route('dashboard', ['paymentStatus' => $request->paymentStatus])->with('popup-message', 'DONE!');
    }
}
