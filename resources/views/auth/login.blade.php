<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mu Ecommerce</title>
  <script src="{{asset('js\app.js')}}" defer></script>
  <link rel="stylesheet" href="{{asset('css\app.css')}}">
  <link rel="stylesheet" href="{{asset('css\style2.css')}}">
  
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <style>
    @media only screen and (max-width: 600px) {
      body {
        background: red
      }
    }
    body{
      background: rgba(214, 207, 169, 0.5)
    }
  </style>
</head>
<body class="logi" style="">
  <div class="card mb-5 logi" style="max-width: 570px;" >
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="{{ URL::asset('storage/gift.png')}}" class="card-img mt-4 jj" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
        <h5 class="card-title kk"> <strong>LOG IN</strong></h5> 
          <hr>
          <form method="post" action="{{ url('/login') }}">
            @csrf
            
            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
              {{-- <label for="email">Email</label> --}}
              <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </div>
            
            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
              <input type="password" class="form-control" placeholder="Password" name="password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
              
            </div>
            <div class="form-group row">
              <div class="col-md-8">
                <a href="{{ url('/password/reset') }}">I forgot my password</a><br>
                <a href="{{ url('/register') }}" class="text-center">Register a new Account</a>
              </div>
              <div class="col-md-4">
                <button type="submit" class="btn btn-primary float-right">Sign in</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>