<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiMessagesController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);

        $validator = Validator::make(
            $data,
            [
                'name' => 'required|string',
                'lastname' => 'required|string',
                'email' => 'required|email',
                'content' => 'required|text',
            ]
        );

        // Check Errors and send
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->error()
            ]);
        };

        // Store the message
        $newMail = new Message();
        $newMail->fill($data);
        $newMail->save();

        return response()->json([
            'success' => true,
        ]);
    }
}
