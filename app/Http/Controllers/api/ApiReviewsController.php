<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiReviewsController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);

        $validator = Validator::make(
            $data,
            [
                'user_id' => 'required|numeric',
                'email' => 'required|email',
                'name' => 'required|string',
                'lastname' => 'required|string',
                'content' => 'required|string',
                'rating' => 'required|numeric|min:0|max:10'
            ]
        );

        // Check Errors and send
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        };

        // Store the message
        $newMail = new Review();
        $newMail->fill($data);
        $newMail->save();

        return response()->json([
            'success' => true,
        ]);
    }
}
