@extends('layout.base')

@section('content')
<div class="row">
    <div class="col-md-6 mx-auto p-0">
        <div class="card">
            <div class="login-box">
                <div class="login-snip"> 
                    <div class="text-center">
                        <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
                        <label for="tab-1" class="tab">Login</label>
                    </div> 
                    <div class="login-space">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="login">
                                @if (\Session::has('error'))
                                    <div class="pt-6 pb-4">
                                        {!! \Session::get('error') !!}
                                    </div>
                                @endif
                                <div class="group"> 
                                    <label for="user" class="label">Email</label> 
                                    <input id="user" type="email" name="email" value="{{ old('email') }}" class="input" placeholder="Enter email">
                                    @error('email')
                                        <span class="text-red">{{ $message }}</span>
                                    @enderror 
                                </div>
                                <div class="group"> 
                                    <label for="pass" class="label">Password</label> 
                                    <input id="pass" type="password" name="password" class="input" data-type="password" placeholder="Enter password">
                                    @error('password')
                                        <span class="text-red">{{ $message }}</span>
                                    @enderror  
                                </div>
                                {{-- <div class="group"> 
                                    <input id="check" type="checkbox" class="check" checked> 
                                    <label for="check"><span class="icon"></span> Keep me Signed in</label> 
                                </div> --}}
                                <div class="group pt-4"> 
                                    <input type="submit" class="button" value="Sign In"> 
                                </div>
                                <div class="hr"></div>
                                <div class="foot">  
                                    <label for="tab-1">Don't have an account?</label> 
                                    <a href="{{ route('sign-up') }}">Sign Up</a> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection