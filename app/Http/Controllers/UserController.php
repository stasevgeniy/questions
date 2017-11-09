<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{

    public function register(){
        return view('auth/register');
    }

    public function enter(){
        return view('auth/enter');
    }

    public function createUser(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->to('/');
    }

    public function postLogin(Request $request)
    {

        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->to('/');
        }else{
            return view('auth/enter');
        }
    }

    public function exitUser(){
        Auth::logout();
        return redirect()->to('/');
    }

}
