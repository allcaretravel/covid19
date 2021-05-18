@extends('layout')
@section('title','Home')
@section('content')
    <h1 class="text-center">Welcome {{Auth::user() ? ucfirst(Auth::user()->name) : ''}}</h1>
@endsection
