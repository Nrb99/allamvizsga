<?php

namespace App\Http\Controllers;


use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function create()
    {
        return view('registration');
    }
    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());
        return redirect('login')->with('message','You have been registered. Now you can log in');
    }
    public function login()
    {
        return view('login');
    }
    public function authenticate(Request $request)
    {
        if(Auth::check()){
            return redirect()->route('show');
        }
        $credentials=$request->validate([
            'email'=> ['required','email'],
            'password' => 'required',
        ]);


        if(Auth::attempt($credentials)){

            $request->session()->regenerate();

            return redirect()->route('show');
        }
        return redirect()->route('login')->with('message','E-mail vagy jelszo nem megfelelo');

    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
