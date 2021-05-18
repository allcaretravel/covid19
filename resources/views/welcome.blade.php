@extends('layout')
@section('title','Home')
@section('content')
    <h2 class="text-center">Welcome {{Auth::user() ? ucfirst(Auth::user()->name) : ''}}</h2>
@endsection
