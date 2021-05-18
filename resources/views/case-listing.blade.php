@extends('layout')
@section('title','Case Listing')
@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-8 col-xs-12">
            <div class="row mb-4">
                <div class="col-sm-12 col-xs-12">
                    <form action="{{route('listing')}}" method="POST" autocomplete="off">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 col-xs-12">
                                <label for="">Province</label>
                                @include('province-select')
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <label for="">Date</label>
                                <input type="text" class="form-control date_picker" name="date">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <button class="btn btn-primary float-right">Search <i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Province</th>
                            <th scope="col">Case</th>
                            <th scope="col">Recovered</th>
                            <th scope="col">Deaths</th>
                            <th scope="col">Community Case</th>
                            <th scope="col">Foreigner Case</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($case) > 0)
                            @foreach($case as $key => $c)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$c->date ? date('d-m-Y',strtotime($c->date)) : ''}}</td>
                                    <td>{{optional($c->province)->name}}</td>
                                    <td>{{@$c->total}}</td>
                                    <td>{{ @$c->recovered }}</td>
                                    <td>{{ @$c->deaths }}</td>
                                    <td>{{ @$c->community_case }}</td>
                                    <td>{{ @$c->foreigner_case }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="8" class="text-center">No Data</th>
                            </tr>
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="3" class="text-right">Total</th>
                            <th>{{@$sum_case}}</th>
                            <th>{{@$sum_recovered}}</th>
                            <th>{{@$sum_deaths}}</th>
                            <th>{{@$sum_community}}</th>
                            <th>{{@$sum_foreigner}}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
