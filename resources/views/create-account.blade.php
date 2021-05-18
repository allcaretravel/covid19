@extends('layout')
@section('title','Create Account')
@section('content')
    <form action="{{route('register')}}" method="POST">
        @csrf
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="form-group row">
                    <div class="col-sm-6 col-xs-12">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required>
                        @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required id="email">
                        @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 col-xs-12">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required id="password">
                        @error('password')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" required id="confirm_password">
                        @error('confirm_password')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
