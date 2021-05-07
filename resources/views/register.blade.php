@extends('layout')

@section('content')

<h2>Request Form</h2>

    <!-- message -->
    @if(Session::has('success'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            </div>
        </div>
    @endif

    <form action="/register_action" method="post">
    @csrf
        
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="name" class="form-control" id="name" placeholder="Enter name" name="username">

            @if($errors->has('username')) <p>{{$errors->first('username')}}</p> @endif <!-- message -->
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">

            @if($errors->has('email')) <p>{{$errors->first('email')}}</p> @endif
        </div>

        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">

            @if($errors->has('password')) <p>{{$errors->first('password')}}</p> @endif
        </div>

        <div class="form-group">
            <label for="pwd">Confirm Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter confirm password" name="password_confirmation">

            @if($errors->has('cpassword')) <p>{{$errors->first('cpassword')}}</p> @endif
        </div>

        <button type="submit" class="btn btn-default">CREATE ACCOUNT</button>

    </form>

@endsection