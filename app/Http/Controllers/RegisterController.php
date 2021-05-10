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
    public function index(CreateRegisterRequest $request)
    {
            $user = new User();
            $user->name     = $request->input('username');
            $user->email        = $request->input('email');
            $user->password     = bcrypt($request->input('password'));
            $user->save();

            return Redirect::to('register')->with('success', 'successfully registered');
    }

    public function login(CreateLoginRequest $request)
    {
            $data = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );

            if(Auth::attempt($data)){
                return Redirect::to('entry');
            }else{
                return Redirect::to('signin');
            }
    }
}
