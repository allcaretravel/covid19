<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function signup()
    {
        return view('auth.sign_up');
    }

    public function login(LoginRequest $request)
    {
        try {
            $validated = $request->validated();
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('admin.covid.index');
            }
            return redirect()->back()->with('error', 'Invalid credentials'); 

            if (!$validated) {
                return Redirect::back()->withInput(Input::all());
            } 
        } catch (\Exception $e) {
            throw ($e);
        }
    }

    public function signout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }

    public function register(RegisterRequest $request)
    {
        try {
            $validated = $request->validated();
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            
            $token = $user->createToken('auth_token')->plainTextToken;
            if (!$validated) {
                return Redirect::back()->withInput(Input::all());
            }
            return redirect()->back()->with('success', 'Register successfull'); 
            // return response()->json([
            //     'access_token' => $token,
            //     'token_type' => 'Bearer'
            // ]);
        } catch (\Exception $e) {
            throw ($e);
        }
    }
}
