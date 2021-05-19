@extends('admin.layout.base')

@section('content')
<div class="card p-4 m-3">
   <div class="card-body">
     <h5 class="card-title text-center">FORM CREATE COVID 19 CASE</h5>
   </div>
   <div class="card-body">
      <div class="pb-5">
         <a href="{{ route('admin.covid.create') }}" class="btn btn-primary">Add New</a>
         <ul class="list-group pull-right">
            <form action="{{ route('admin.covid.index') }}" method="GET">
               <li class="list-group-item d-flex">
                  
                  <div class="mr-3">
                     <label for="">Area</label>
                     <select class="form-control" id="area" name="area_id">
                        <option value="">Select Area</option>
                        @foreach ($areas as $item)
                           <option value="{{ $item->id }}" {{ isset($_GET['area_id']) && $_GET['area_id'] == $item->id ? 'selected="selected"' : '' }}>{{ $item->name }}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="mr-3">
                     <label for="">Date</label>
                     <input type="text" name="date" value="{{ isset($_GET['date']) ? $_GET['date'] : '' }}" class="form-control" id="datepicker" autocomplete="off">
                  </div>
                  <div class="">
                     <button type="search" class="btn btn-primary d-block mt-4">
                        <i class="fa fa-search"></i>
                     </button>
                  </div>
               </li>
            </form>
          </ul>
      </div>
      <table class="table table-bordered mt-4">
         <thead>
            <tr>
               <th scope="col">#</th>
               <th scope="col">Community Case</th>
               <th scope="col">Foreigner Case</th>
               <th scope="col">Dead Case</th>
               <th scope="col">Date</th>
               <th scope="col">Area</th>
            </tr>
         </thead>
         <tbody>
            @if(count($covids) > 0)
            @php 
               $community_case = 0;
               $foreigner_case = 0;
               $dead_case = 0;
            @endphp
            @foreach ($covids as $item)
               <tr>
                  <th scope="row">{{ $item->id }}</th>
                  <td>{{ $item->community_case }}</td>
                  <td>{{ $item->foreigner_case }}</td>
                  <td>{{ $item->dead_case }}</td>
                  <td>{{ DateTimeFormat($item->date) }}</td>
                  <td>{{ $item->area->name }}</td>
               </tr>
               @php 
                  $community_case += $item->community_case;
                  $foreigner_case += $item->foreigner_case;
                  $dead_case += $item->dead_case;
               @endphp
            @endforeach
            <tr class="total">
               <th scope="row">Total</th>
               <td>{{ $community_case }}</td>
               <td>{{ $foreigner_case }}</td>
               <td>{{ $dead_case }}</td>
               <td colspan="2"></td>
            </tr>
            @else 
               <tr>
                  <th colspan="6" class="text-center">No Data</th>
               </tr>
            @endif
         </tbody>
       </table>
    </div>
 </div>
@endsection