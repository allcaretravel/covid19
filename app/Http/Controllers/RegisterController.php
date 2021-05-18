<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create_account()
    {
        return view('create-account');
    }
    public function register(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'email' => 'required|unique:users',
           'password' => 'required|min:6',
           'confirm_password' => 'required|min:6|same:password',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('sign_in')->with('success','Register success');
    }
    public function sign_in_form()
    {
        return view('sign-in');
    }
    public function sign_in(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect('/');
        }
        return redirect()->back()->with('error','Login Fails');
    }
    public function sign_out()
    {
        Auth::logout();
        return redirect('/');
    }
}
