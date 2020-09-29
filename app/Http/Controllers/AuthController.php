<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if (Hash::check($request->input('password'), $user->password)){
            $apikey = base64_encode(Str::random(40));

            $user->update(['api_key' => $apikey]);

            return response()->json(['status' => 'success', 'api_key' => $apikey]);
        }
          
        return response()->json(['status' => 'fail'], 401);
    }
}    

