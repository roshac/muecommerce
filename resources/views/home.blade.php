@extends('layouts.app')

@section('content')
<div id="demo" class="carousel slide " data-ride="carousel">
  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
  </ul>
  <!-- The slideshow -->
  <div class="carousel-inner" >
    <div class="carousel-item active">
      <img src="{{URL::asset('storage/Asset.png')}}" alt="Los Angeles" height="200px" width="100%" >
    </div>
    <div class="carousel-item">
      <img src="{{URL::asset('storage/Asset7.png')}}" alt="Los Angeles"height="200px" width="100%" >
    </div>
    <div class="carousel-item">
      <img src="{{URL::asset('storage/Asset2.png')}}" alt="Los Angeles"height="200px" width="100%">
    </div>
    <div class="carousel-item">
      <img src="{{URL::asset('storage/Asset5.png')}}" alt="Los Angeles"height="200px" width="100%">
    </div>
  </div>
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
  
</div>
<div class="container mt-3">
  <div class="row">
    <div class="col-md-4">
      <div class="card bg-primary">
        <div class="card-header" style="text-align: center"><strong>Recomendation</strong></div>
        <table class="table">
          <tr>
          <th>Photo</th><th>Name</th><th>Price</th></tr>
        @foreach ($produ as $us)
  

        <tr>
          <td> <img src="{{URL::asset('storage/' . $us->photo)}}" width="40" height="40"
        alt="User Image"/></td><td>{{$us->name}}</td><td><small>{{$us->price}}</small></td>
        </tr>
       
        @endforeach
        </table>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-success">
        <div class="card-header" style="text-align: center"><strong>Most Order Items</strong></div>
        <table class="table">
          <tr>
          <th>Photo</th><th>Name</th><th>Price</th></tr>
        @foreach ($prod as $us)
        <tr>
          <td> <img src="{{URL::asset('storage/' . $us->photo)}}" width="40" height="40"
        alt="User Image"/></td><td>{{$us->name}}</td><td><small>{{$us->price}}</small></td>
        </tr>
       
        @endforeach
        </table>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header" style="text-align: center"><strong>Join Our Sale Team</strong></div>
        <table class="table">
          <tr>
          <th>Photo</th><th>Name</th><th>Company</th></tr>
        @foreach ($user as $us)
        @foreach($us->company as $com)

        <tr>
          <td> <img src="{{URL::asset('storage/' . $us->photo)}}" width="40" height="40"
            class="rounded-circle" alt="User Image"/></td><td>{{$us->name}}</td><td><small>{{$com->name}}</small></td>
        </tr>
        @endforeach  
        @endforeach
        </table>
      </div>
      <div class="card-footer">
        <a href="{!!URL::to('sell_with')!!}" class="btn btn-primary"><i class="fa fa-shopping-bag"></i><span> Sell with us</span></a>
      </div>
    </div>
    
  </div>
  
</div>

@endsection
