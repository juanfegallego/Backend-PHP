<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class PassportAuthController extends Controller
{
    // REGISTER

    public function register(Request $request){

        $this -> validate( $request, [

            'name' => 'required|min:4',
            'streamUsername' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:8',

        ]);

        $user = User::create ([

            'name' => $request->name,
            'streamUsername' => $request->streamUsername,
            'email' => $request->email,
            'password' => bcrypt($request->password),

        ]);

        $token = $user -> createToken('LaravelAuthApp') -> accessToken;
        return response()->json(['token' => $token], 200);

    }

    // LOGIN

    public function login(Request $request){
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (auth()->attempt($data)){
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    // LOGOUT 
        
    public function logout(Request $request){
    } 
}

