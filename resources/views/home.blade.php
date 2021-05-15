@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Case Entry</h2>

    <!-- message -->
    @if(Session::has('success'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
        </div>
    @endif

    <form action="/entry" method="post">
    @csrf

        <div class="form-group">
            @livewire('select')
        </div>
<!--  -->
        <div class="form-group">
            <label for="infec">Infection Type:</label>
            <select name="infec" id="case" class="form-control input-lg">
                    <option>Select Infection</option>      
                    <option value="Community">Community</option>      
                    <option value="Forigner">Forigner</option>      
            </select>
        </div>
<!--  -->
        <label>Case:</label>
        <div style="border: 1px solid #b0afaf94; margin: 0 0 15px 0;" class="form-group row">
            <div style="padding: 15px;" class="col-xs-2">
                <input type="text" class="form-control" id="heal" name="heal" placeholder="Heal" required>
            </div>
            <div style="padding: 15px;" class="col-xs-2">
                <input type="text" class="form-control" id="curing" name="curing" placeholder="Curing" required>
            </div>
            <div style="padding: 15px;" class="col-xs-2">
                <input type="text" class="form-control" id="infection" name="infection" placeholder="Infection" required>                
            </div>
            <div style="padding: 15px;" class="col-xs-2">
                <input type="text" class="form-control" id="death" name="death" placeholder="Death" required>
            </div>
        </div>
<!--  -->
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date" required>

        </div>


        <button type="submit" class="btn btn-default">SUBMIT</button>
    </form>
</div>
@endsection
