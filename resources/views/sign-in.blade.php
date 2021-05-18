@extends('layout')
@section('title','Sign In')
@section('content')
    <form action="{{route('sign_in')}}" method="POST">
        @csrf
        <div class="row justify-content-center">
            <div class="col-sm-8">
                @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{session()->get('error')}}
                    </div>
                @endif
                <div class="form-group row">
                    <div class="col-sm-12 col-xs-12">
                        <label for="">Email</label>
                        <input type="email" class="form-control @error('email') is-valid @enderror" name="email" required>
                        @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 col-xs-12">
                        <label for="">Password</label>
                        <input type="password" class="form-control @error('password') is-valid @enderror" name="password" required>
                        @error('password')
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
