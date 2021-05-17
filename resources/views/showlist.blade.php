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
        @foreach($data as $id => $value)
        <tr>
            <td>{{++$id}}</td>
            <td>{{$value->user->name}}</td>
            <td>{{$value->province->name}}</td>
            <td>{{$value->area->name}}</td>
            <td>{{$value->infection_type}}</td>
            <td>{{$value->heal}}</td>
            <td>{{$value->curing}}</td>
            <td>{{$value->infection}}</td>
            <td>{{$value->death}}</td>
            <td>{{$value->created_at}}</td>
        </tr>
        @endforeach
    </table>   
    
    {{ $data->links() }}   
</div>
@endsection