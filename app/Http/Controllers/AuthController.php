<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "username" => ["required", "exists:users,username", "max:255"],
            "password" => ["required", "max:100"]
        ]);

        if($validator->fails()){
            return back()->with('error', $validator->errors());
        }

        if(Auth::attempt(["username" => $request->username, "password" => $request->password])){
            $user = Auth::user();
            if($user->role == 'admin'){
                return redirect()->route('product.index');
            }
        }
        return back()->with('error', ["message" => "Username/Password tidak ditemukan"]);   
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        Auth::logout($user);
        return redirect()->route('auth.index');
    }
}
