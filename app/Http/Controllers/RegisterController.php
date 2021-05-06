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
    public function index(){
        // echo 'Welcome';
        $data=Input::except(array('_token'));

        // var_dump($data);

        $rule = array(
            'username'  =>  'required',
            'email'     =>  'required|email',
            'password'  =>  'required|min:6',
            'cpassword' =>  'required|same:password'
        );

        $message = array(
            'cpassword.required' => 'the confirm password is required',
            'cpassword.min'     => 'the confirm password must be at least 6 characters',
            'cpassword.same'     => 'the confirm password and password must same'
        );

        $validator = Validator::make($data, $rule, $message);

        if($validator->fails()){
            return Redirect::to('register')->withErrors($validator);
        } else{
            Register::formstore(Input::except(array('_token','cpassword')));

            return Redirect::to('register')->with('success', 'successfully registered');
        }
    }

    public function login(){

        $data=Input::except(array('_token'));

        // var_dump($data);

        $rule = array(
            'email'     =>  'required|email',
            'password'  =>  'required|min:6',
        );

        $validator = Validator::make($data, $rule);

        if($validator->fails()){
            return Redirect::to('signin')->withErrors($validator);
        }else{
            // $data=Input::except(array('_token'));

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
