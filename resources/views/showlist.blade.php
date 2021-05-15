@extends('layouts.app')

@section('content')

<div class="container">
<h2>Case List</h2>

    <table class="table table-hover">
        <tr>
            <th>No.</th>
            <th>User</th>
            <th>Province</th>
            <th>Area</th>
            <th>Infection Type</th>
            <th>Heal</th>
            <th>Curing</th>
            <th>Infection</th>
            <th>Death</th>
            <th>Date</th>
        </tr>
        @foreach($data as $id => $data)
        <tr>
            <td>{{++$id}}</td>
            <td>{{$data->user->name}}</td>
            <td>{{$data->province->name}}</td>
            <td>{{$data->area->name}}</td>
            <td>{{$data->infection_type}}</td>
            <td>{{$data->heal}}</td>
            <td>{{$data->curing}}</td>
            <td>{{$data->infection}}</td>
            <td>{{$data->death}}</td>
            <td>{{$data->date}}</td>
        </tr>
        @endforeach
    </table>      
</div>
@endsection