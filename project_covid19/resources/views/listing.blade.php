@extends('layout')

@section('content')

    <h2>Case Listing All</h2>    

    <!-- Search Area, Province and Case -->
    <form method="get" action="/search" style="float: right; display: flex; margin-bottom: 15px;"  class="input-group">
        <input name="search" type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
            aria-describedby="search-addon" />
        <button type="submit" class="btn btn-outline-primary">search</button>
    </form>


    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Area</th>
                <th>Province</th>
                <th>Case</th>
                <th>Date</th>
                <th>Amount</th>
            </tr>
        </thead>

        <tbody>
        @foreach($list as $id => $listed)
            <tr>
                <td>{{++$id}}</td>
                <td>{{$listed->area}}</td>
                <td>{{$listed->province}}</td>
                <td>{{$listed->case}}</td>
                <td>{{$listed->date}}</td>
                <td>{{$listed->amount}}</td>
            </tr>
        @endforeach
    </tbody>
  </table>

<!-- pagination -->
    <div style="margin-top: 20px">  
        {{$list->links()}}
    </div>  

<!-- Total -->
    <div style="float: right">        
        <label for="">Total Infection​</label>
        <button class="btn"> {{$total}}</button>
    </div>

<!-- Case Area -->
  <h2>Case List Area</h2>  
  <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Area</th>
                <th>Amount</th>
            </tr>
        </thead>

        <tbody>
        @foreach($sum_area as $id => $data)
            <tr>
                <td>{{++$id}}</td>
                <td>{{$data->area}}</td>
                <td>{{$data->Amount}}</td>
            </tr>
        @endforeach
    </tbody>
  </table>

  <!-- Case Province -->
  <h2>Case List Province</h2>  
  <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Province</th>
                <th>Amount</th>
            </tr>
        </thead>

        <tbody>
        @foreach($sum_province as $id => $data)
            <tr>
                <td>{{++$id}}</td>
                <td>{{$data->province}}</td>
                <td>{{$data->Amount}}</td>
            </tr>
        @endforeach
    </tbody>
  </table>

  <!-- Case Province -->
  <h2>Case List Case</h2>  
  <table style="margin-bottom: 50px;" class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Case</th>
                <th>Amount</th>
            </tr>
        </thead>

        <tbody>
        @foreach($sum_case as $id => $data)
            <tr>
                <td>{{++$id}}</td>
                <td>{{$data->case}}</td>
                <td>{{$data->Amount}}</td>
            </tr>
        @endforeach
    </tbody>
  </table>  
 



@endsection