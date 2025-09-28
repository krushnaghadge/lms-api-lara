<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    //
    public function register(Request $request)
    {

        $validator =  Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        }

        //now save user data
        $user = new User();
        // $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json([
            'status' => 200,
            'message' => 'User registered successfully',
        ]);
    }

    public function authonticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //this will return error if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = User::find(Auth::user()->id);
            // Generate token
            $token = $user->createToken('token')->plainTextToken;

            return response()->json([
                'status' => 200,
                'token' => $token,
                'name' => $user->name,
                'id' => $user->id,
            ], 200);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Invalid credentials',
            ], 401);
        }
    }
}
