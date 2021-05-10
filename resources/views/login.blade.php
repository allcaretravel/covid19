@extends('layout')

@section('content')

<h2>Sign in to continue</h2>

    <form action="/check" method="post">
    @csrf

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
            
            @if($errors->has('email')) <p>{{$errors->first('email')}}</p> @endif  <!-- message -->
        </div>

        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>

            @if($errors->has('password')) <p>{{$errors->first('password')}}</p> @endif
        </div>

        <button type="submit" class="btn btn-default">SIGN IN</button>
    </form>

@endsection