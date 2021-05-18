<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function CreateAccount()
    {
        return view('create-account');
    }
    public function register(UserStoreRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect()->route('SignIn')->with('success','Register success');
    }
    public function SignInForm()
    {
        return view('sign-in');
    }
    public function SignIn(Request $request)
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
    public function SignOut()
    {
        Auth::logout();
        return redirect('/');
    }
}
