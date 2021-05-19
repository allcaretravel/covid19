@extends('layout.base')

@section('content')
<div class="row">
    <div class="col-md-6 mx-auto p-0">
        <div class="card">
            <div class="logout-box">
                <div class="login-snip"> 
                    <div class="text-center">
                        <input id="tab-2" type="radio" name="tab" class="sign-up" checked>
                        <label for="tab-2" class="tab">Sign Up</label>
                    </div>
                    @if (\Session::has('success'))
                        <div class="pt-6 pb-4">
                            {!! \Session::get('success') !!}
                        </div>
                    @endif
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="login-space">
                            <div class="sign-up-form">
                                <div class="group"> 
                                    <label for="user" class="label">Full Name</label> 
                                    <input id="user" name="name" type="text" class="input" value="{{ old('name') }}" placeholder="Enter full name"> 
                                    @error('name')
                                        <span class="text-red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="group"> 
                                    <label for="pass" class="label">Email Address</label> 
                                    <input id="pass" name="email" type="text" class="input" value="{{ old('email') }}" placeholder="Enter email"> 
                                    @error('email')
                                        <span class="text-red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="group"> 
                                    <label for="pass" class="label">Password</label> 
                                    <input id="pass" name="password" type="password" class="input" data-type="password" placeholder="Enter password"> 
                                    @error('password')
                                        <span class="text-red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="group"> 
                                    <label for="pass" class="label">Confirm Password</label> 
                                    <input id="pass" name="password_confirmation" type="password" class="input" data-type="password" placeholder="Enter confirm password"> 
                                    @error('password_confirmation')
                                        <span class="text-red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="group"> 
                                    <input type="submit" class="button" value="Sign Up"> 
                                </div>
                                <div class="hr"></div>
                                <div class="foot"> 
                                    <label for="tab-1">Already have an account?</label> 
                                    <a href="{{ route('index') }}">Sign In</a> 
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection