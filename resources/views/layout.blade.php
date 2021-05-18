<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('app.css')}}">
    <link rel="stylesheet" href="{{asset('datepicker/bootstrap-datepicker.min.css')}}">
    <title>Covid19 | @yield('title') </title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Covid 19</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            @if(Auth::user())
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{request()->routeIs('province_list') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('province_list')}}">Province</a>
                    </li>
                    <li class="nav-item {{request()->routeIs('entry') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('entry')}}">Case Entry</a>
                    </li>
                    <li class="nav-item {{request()->routeIs('listing') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('listing')}}">Case Listing</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{route('sign_out')}}" class="nav-link"><span class="mr-3">{{ucfirst(Auth::user()->name)}}</span> <span class="fa fa-sign-out"> Sign Out</span></a>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav">
                    <li class="nav-item {{request()->routeIs('create_account') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('create_account')}}">Create Account</a>
                    </li>
                    <li class="nav-item {{request()->routeIs('sign_in_form') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('sign_in_form')}}"><span class="fa fa-sign-in mr-1"> </span> Sign In</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>

<div class="container-fluid mt-4">
    @yield('content')
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('jquery-3.3.1.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="{{asset('datepicker/bootstrap-datepicker.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $(".date_picker").datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true
        });
    });
</script>
</body>
</html>
