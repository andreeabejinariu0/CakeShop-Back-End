<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\User;
use Hash;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $request->validate( [
        'name'=>'required| max: 255',
        'phone'=>'required| max: 255',
        'email'=>'required|unique: clients| max: 255',
        'password'=>'required| min: 5'
        ]);

        $user = User ::create([
            'name'=> $request->name,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->accessToken;

        return response([
                'token'=>$token
        ]);
    }

    public function login(Request $request)
    {
        $request->validate( [
            'email'=>'required',
            'password'=>'required | min: 5'
            ]);
            echo $request->email;exit;
        $user = User::where('email',$request->email)->first();
        return $user;

        if( !$user || Hash::check($request->password, $user->password ))
        {
            return response([
                'message'=>'The provided credentials are incorrect!'
            ]);
        }

        $token = $user->createToken('auth_token')->accessToken;

        return response([
            'token'=>$token
    ]);

    }
    
    public function logout(Request $request)
    {
        $request->client()->token()->revoke();

        return response([
            'message'=>'Logged out sucesfully'
        ]);
    }

}
