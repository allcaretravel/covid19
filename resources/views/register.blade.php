<!DOCTYPE html>
<html lang="en">
  @include('includes/header')
  <style>
      *{
          box-sizing: border-box;
      }
      body{
          background: #757575;
height: 100%;
margin: 0;
      }
#login-form{
    width: 500px;
    height: 100%;
    margin-left: auto;
    margin-right: auto;
    margin-top: 50px;
}
  </style>
<body>
    
   <div class="container">
       <div id="login-form">
        <div class="card">

            <h5 class="card-header info-color white-text text-center py-4">
              <strong>Sign Up</strong>
            </h5>
          
            <!--Card content-->
            <div class="card-body px-lg-5 pt-0">

              @if ($message = Session::get('error'))
<div class="alert alert-danger mt-2">
{{ $message}}
</div>
              @endif

          @if (count($errors) > 0)

          <div class="alert alert-danger mt-2">
            <ul>
              @foreach ($errors->all() as $error)
    <li> {{ $error }} </li>
              @endforeach
            </ul>
           
          </div>
          @endif
              <!-- Form -->
              <form class="text-center" style="color: #757575;" action=" {{ url('/sign_up/checkRegister') }} ">
          {{ csrf_field() }}
 <!-- Email -->
 <div class="md-form">
    <input type="text" name="username" class="form-control">
    <label >Username</label>
  </div>

                <!-- Email -->
                <div class="md-form">
                  <input type="text" name="email" class="form-control">
                  <label for="materialLoginFormEmail">E-mail</label>
                </div>
          
                <!-- Password -->
                <div class="md-form">
                  <input type="password" name="password" class="form-control">
                  <label for="materialLoginFormPassword">Password</label>
                </div>

                   <!-- Password -->
                   <div class="md-form">
                    <input type="password" name="confirmpassword" class="form-control">
                    <label for="materialLoginFormPassword">Confirm Password</label>
                  </div>
          
                          <!-- Sign in button -->
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit"> Sign up </button>
              </form>
              <!-- Form -->
          
            </div>
          
          </div>
       </div>

   </div>

    @include('includes/footer')
    @include('includes/scripts')
</body>
</html>