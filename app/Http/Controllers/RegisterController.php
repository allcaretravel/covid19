<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use App\Models\Register;
use Auth;

class RegisterController extends Controller
{
    public function index(Request $request){

        $validator = Validator::make($request->all(), [
            'username'  =>  'required',
            'email'     =>  'required|email',
            "password" =>   'required|confirmed'
        ]);

        if($validator->fails()){
            return Redirect::to('register')->withErrors($validator);
        } else{
            Register::formstore(Input::except(array('_token','cpassword')));

            return Redirect::to('register')->with('success', 'successfully registered');
        }
    }

    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'email'     =>  'required|email',
            'password'  =>  'required',
        ]);

        if($validator->fails()){
            return Redirect()
                    ->back()
                    ->withErrors($validator);
        }else{
            $data=Input::except(array('_token'));

            $userdata = array(
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
}
