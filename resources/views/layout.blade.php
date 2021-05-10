<!DOCTYPE html>
<html lang="en">
<head>
  <title>Covid-19</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Covid-19</a>
    </div>
    <ul class="nav navbar-nav">

      {{-- @if(Auth::user()) login success show two case --}}

      <li class="active"><a href="/entry">Case entry</a></li>
      <li><a href="/listing">Case listing</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li>
        <a href="{{URL::to('/signout')}}">
          <span style="color: white; margin-right: 10px">{{-- ucwords(Auth::user()->name) --}}</span>  <!--  login success show user name in nav bar  -->
          <span class="glyphicon glyphicon-log-in"></span> Sign Out
        </a>
      </li>
      
      {{-- @else --}}

      <li><a href="{{URL::to('/register')}}"><span class="glyphicon glyphicon-user"></span> Create Account</a></li>
      <li><a href="{{URL::to('/signin')}}"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
    
    {{--  @endif --}}
    </ul>
  </div>
</nav>
  
<div class="container">

  @yield('content')

</div>

</body>
</html>