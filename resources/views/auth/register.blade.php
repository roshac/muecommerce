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
    

    body{
      background: rgba(214, 207, 169, 0.5)
    }
  </style>
</head>
<div class="card mt-5 regi" style="">
    <img src="{{ URL::asset('storage/gift.png')}}" height="150" width="180" style="margin-left: 24%" alt="...">
    <h5 class="card-title" style="text-align: center"><strong>Register Account</strong></h5>
    <hr>
    <div class="card-body">
     
      <form method="post" action="{{ url('/register') }}">
        @csrf

        <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
        <div class="row"><div class="col-md-4">
            <label for="Gender">Gender</label>
            </div>
            <div class="col-md-4">
            <input type="checkbox" name="" value="Male">  Male
        </div>
        <div class="col-md-4">
            <input type="checkbox" name="Female" value="Female">  Female
        </div>

        </div>
        <br>
        <div class="row">
            <div class="col-md-8">
                <a href="{{ url('/login') }}" class="text-center">I already have a membership</a>
            </div>
            <!-- /.col -->
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary float-right">Register</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    
      
    </div>
  </div>
</body>
</html>