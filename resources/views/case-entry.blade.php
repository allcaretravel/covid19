@extends('layout')
@section('title','Case Entry')
@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-8 col-xs-12">
            <div class="row mb-4">
                <div class="col-sm-12 col-xs-12">
                    <h3>Case Entry</h3>
                </div>
            </div>
            <form action="{{route('store_entry')}}" autocomplete="off" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 col-xs-12">
                        <label for="">Date</label>
                        <input type="text" class="form-control date_picker @error('date') is-invalid @enderror" name="date">
                        @error('date')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <label for="">Province</label>
                        <select name="province_id" class="form-control @error('province_id') is-invalid @enderror">
                            <option value="">Please Select</option>
                            @if(count($province) > 0)
                                @foreach($province as $key => $pro)
                                    <option value="{{$key}}">{{$pro}}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('province_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 col-xs-12">
                        <label for="">Total Case</label>
                        <input type="text" class="form-control @error('total') is-invalid @enderror" name="total">
                        @error('total')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <label for="">Recovered</label>
                        <input type="text" class="form-control @error('recovered') is-invalid @enderror" name="recovered">
                        @error('recovered')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 col-xs-12">
                        <label for="">Deaths</label>
                        <input type="text" class="form-control @error('deaths') is-invalid @enderror" name="deaths">
                        @error('deaths')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <label for="">Community Case</label>
                        <input type="text" class="form-control @error('community_case') is-invalid @enderror" name="community_case">
                        @error('community_case')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 col-xs-12">
                        <label for="">Foreigner Case</label>
                        <input type="text" class="form-control @error('foreigner_case') is-invalid @enderror" name="foreigner_case">
                        @error('foreigner_case')
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
