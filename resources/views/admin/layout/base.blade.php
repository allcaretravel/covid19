<!DOCTYPE html>
<html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <title>Admin | Covid 19 news</title>
   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}" defer></script>
   <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="admin">
   
   <div class="sidebar">
      <h4 class="text-bold clearfix text-center">COVID 19 NEWS</h4>
      <a class="navbar {{ (isset($active) && $active === 'index') ? 'active' : '' }}" href="{{ route('admin.covid.index') }}">
         <i class="fa fa-fw fa-list"></i>Covid Case
      </a>
      <a class="navbar {{ (isset($active) && $active === 'create') ? 'active' : '' }}" href="{{ route('admin.covid.create') }}">
         <i class="fa fa-fw fa-plus"></i>Create Covid Case
      </a>

      <a href="{{ route('admin.signout') }}" class="signout">
         <i class="fa fa-fw fa-sign-out"></i>Sign Out
      </a>
   </div>
   
   <div class="main">
      <div class="row">
         <div class="col">
            @yield('content')
         </div>
      </div>
   </div>
   
</body>
</html> 