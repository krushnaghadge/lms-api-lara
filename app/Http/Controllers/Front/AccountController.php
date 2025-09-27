<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    public function register(Request $request){
        $validator =  Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email',
            //'password'=>'required|min:6|confirmed',
        ]);


if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->errors(),
            ]);
        }

//now save user data
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json([
            'status'=>200,
            'message'=>'User registered successfully',
        ]);
    }
}
