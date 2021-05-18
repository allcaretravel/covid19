@extends('layout')
@section('title','Province')
@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-8 col-xs-12">
            <div class="row mb-4">
                <div class="col-sm-12 col-xs-12">
                    <a href="{{route('create_province')}}" class="btn-primary btn float-right">Create</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($provinces) > 0)
                            @foreach($provinces as $key => $p)
                                <tr>
                                    <td scope="row">{{$key+1}}</td>
                                    <td>{{@$p->name}}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="2" class="text-center">No Data</th>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
