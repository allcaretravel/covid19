@extends('layout')
@section('title','Province')
@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-8 col-xs-12">
            <form action="{{route('StoreProvince')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-12 col-xs-12">
                        <label for="">Province</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required>
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
