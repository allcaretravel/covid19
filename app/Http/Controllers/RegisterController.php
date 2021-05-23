<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;

class RegisterController extends Controller
{
    //

    public function index()
    {
        return view('register');
    }

    public function checkRegister(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirmpassword' => 'required'
        ]);
        $user = new User();
        $user->name  = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect(url('/sign_in'))->with('success', 'Regsier Successfully');
    }
}