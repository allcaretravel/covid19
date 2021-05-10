<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateRegisterRequest;
use App\Http\Requests\CreateLoginRequest;
use Input;
use Validator;
use Redirect;
use App\Models\User;
use Auth;

class RegisterController extends Controller
{
    public function createRegister(){
        return view('register');
    }

    public function register(CreateRegisterRequest $request)
    {
            $user = new User();
            $user->name     = $request->input('username');
            $user->email        = $request->input('email');
            $user->password     = bcrypt($request->input('password'));
            $user->save();

            return Redirect::to('register')->with('success', 'successfully registered');
    }

    public function showLogin() {
        return view('login');
    }

    public function login(Request $request)
    {
        $email  = $request->email;
        $password   = $request->password;

        $session = User::where('email', $email)->where('password', $password)->get();

        if(count($session)>0){
            $request->session()->put('user_id', $session[0]->id);
            $request->session()->put('user_name', $session[0]->name);
            return Redirect::to('/entry');

        }else{
            return Redirect::to('/signin');
        }

    }

    public function logout(Request $request)
    {
        $request->session()->forget('user_id');
        $request->session()->forget('user_name');

        return Redirect::to('/signin');
    }
}
