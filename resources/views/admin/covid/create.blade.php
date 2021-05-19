@extends('admin.layout.base')

@section('content')
<div class="card pt-4 pb-4 pr-5 pl-5 m-3">
   <div class="card-body">
      <h5 class="card-title text-center">FORM CREATE COVID 19 CASE</h5>
    </div>
    <form method="POST" action="{{ route('admin.covid.store') }}" >
      @csrf
      <div class="form-group row">
        <label for="community_case" class="col-sm-2 col-form-label">Community Case</label>
        <div class="col-sm-10 mb-3">
          <input type="number" class="form-control" name="community_case" id="community_case">
        </div>
      </div>
      <div class="form-group row">
         <label for="foreigner_case" class="col-sm-2 col-form-label">Foreigner Case</label>
         <div class="col-sm-10 mb-3">
           <input type="number" name="foreigner_case" class="form-control" id="foreigner_case">
         </div>
       </div>
       <div class="form-group row">
         <label for="dead_case" class="col-sm-2 col-form-label">Dead Case</label>
         <div class="col-sm-10 mb-3">
           <input type="number" name="dead_case" class="form-control" id="dead_case">
         </div>
       </div>
       <div class="form-group row">
         <label for="area_id" class="col-sm-2 col-form-label">Area</label>
         <div class="col-sm-10 mb-3">
            <select class="form-control" id="area" name="area_id">
               @foreach ($areas as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
               @endforeach
             </select>
         </div>
       </div>
      
       <div class="form-group row">
         <label for="datepicker" class="col-sm-2 col-form-label">Date</label>
         <div class="col-sm-10 mb-3">
           <input type="text" name="date" value="{{ date('Y-m-d') }}" class="form-control" id="datepicker">
         </div>
       </div>

       <div class="form-group row pull-right">
         <div class="col-sm-10 mb-3 d-flex">
            <a href="{{ route('admin.covid.index') }}" class="btn btn-light mr-4">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>
         </div>
       </div>

    </form>
  </div>
@endsection
