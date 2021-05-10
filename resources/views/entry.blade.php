@extends('layout')

@section('content')


<h2>Case Entry</h2>

<!-- message -->
@if(Session::has('success'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        </div>
    </div>
@endif

<form action="{{route('covid.store')}}" method="post">
    @csrf

<!--  -->
        <div class="form-group">
            <label for="area">Area:</label>
            <select name="area" id="area_name" class="form-control input-lg dynamic" data-dependent="province_name">
                    <option value="">Select Area</option>
                @foreach($value as $data)
                    <option value="{{$data->area_name}}">{{$data->area_name}}</option>
                @endforeach
            </select>

            @if($errors->has('area')) <p>{{$errors->first('area')}}</p> @endif
        </div>

<!--  -->
        <div class="form-group">
            <label for="province">Province:</label>
            <select name="province" id="province_name" class="form-control input-lg dynamic">
                    <option value="">Select Province</option>                
            </select>

            @if($errors->has('province')) <p>{{$errors->first('province')}}</p> @endif
        </div>

<!--  -->
        <div class="form-group">
            <label for="case">Case:</label>
            <select name="case" id="case" class="form-control input-lg">
                    <option value="">Select Case</option> 
                @foreach($case as $case)
                    <option value="{{$case->name}}">{{$case->name}}</option>
                @endforeach               
            </select>

            @if($errors->has('case')) <p>{{$errors->first('case')}}</p> @endif
        </div>

<!--  -->
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date">

            @if($errors->has('date')) <p>{{$errors->first('date')}}</p> @endif
        </div>

<!--  -->
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="text" class="form-control" id="amount" placeholder="Enter amount" name="amount">

            @if($errors->has('amount')) <p>{{$errors->first('amount')}}</p> @endif
        </div>

<!--  -->
        <button type="submit" class="btn btn-default">SUBMIT</button>
    </form>


<!-- script select -->
<script>
    $(document).ready(function(){
        $('.dynamic').change(function(){
            if($(this).val() != '')
            {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('dynamicdependent.fetch') }}",
                    method:"POST",
                    data:{select:select, value:value, _token:_token, dependent:dependent},
                    success:function(result)
                    {
                        $('#'+dependent).html(result);
                    }
                })
            }
        }); 

    });
</script>

@endsection