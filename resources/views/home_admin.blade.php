@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="">
<section class="content-header">
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fa fa-code-fork"></i>
      <span class="count-numbers"><small>@convert($sale)</small></span>
        <span class="count-name">Total Sales</span>
      </div>
    </div> 
    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fa fa-cart-arrow-down"></i>
      <span class="count-numbers">{{$orda}}</span>
        <span class="count-name">Orders</span>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card-counter success">
        <i class="fa fa-database"></i>
      <span class="count-numbers">{{$prod}}</span>
        <span class="count-name">Products</span>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card-counter info">
        <i class="fa fa-users"></i>
      <span class="count-numbers">{{$user}}</span>
        <span class="count-name">Users</span>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    {{-- <div class="card"> --}}
      {{-- <div class="header" style="text-align: center; padding: %"><h4><b>TODAY SALES</b></h4></div> --}}
      {{-- @include('test') --}}
      {{-- <chart-e></chart-e> --}}
    
        <div class="flex">
        <div class="w-1/2">
        {!! $chart->container() !!}
      </div>
      </div>
        {!! $chart->script() !!}
      
      {{-- </div> --}}
    </div>
    
    <div class="col-md-6" style="">
      {{-- @include('test') --}}
      <table class="table mt-4 table-striped table-responsive">
        <tr><th colspan="7" style="text-align: center">Top Salers</th></tr>
        <tr><th>S/No</th><th>Name</th><th>Photo</th><th>Brand Name</th><th>Status</th><th>Total Amount</th></tr>
        @foreach ($order_product as $key => $product)
        @foreach ($product->company as $company)
          <tr><td>{{++$key}}</td><td>{{ $product->name }}</td><td> <img src="{{URL::asset('storage/' . $product->photo)}}" width="40" height="40"
          class="rounded-circle" alt="User Image"/></td><td><small ><b>{{$company->name}}</b></small></td><td>
            @if ($company->status == "0")
            <i class="fa fa-times" style="color: red"></i> 
            @else
            <i class="fa fa-check" style="color: green"></i>
            @endif
          </td><td>Tsh: <b>@convert($product->skus_count)</b></td></tr>
          @endforeach
          @endforeach
        </table>
        {{-- <bid-price>ii</bid-price> --}}
      </div>
    </div>
    <div class="row" class="mt-4">
      <div class="col-md-6">
      <div class="card">
        <div class="card-header" style="text-align: center">Recent Product Aded</div>
        <table class="table">
          <tr><th>S/No</th><th>Product Name</th><th>Saller</th><th>Price</th></tr>
          @foreach($products as $key => $produc)

        <tr><td>{{++$key}}</td><td>{{$produc->name}}</td><td>{{$produc->user->name}}</td><td>@convert($produc->price)</td></tr>
          @endforeach

        </table>
      </div>

      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header" style="text-align: center"><strong>Saller Account Request</strong></div>
        <table class="table">
          <tr><th>S/No</th><th>User Name</th><th>Company Name</th><th>Approve</th></tr>
          @foreach($seller as $key => $sal)
          @if($sal->user->hasNRole('Seller'))
          <tr><td>{{++$key}}</td><td>{{$sal->user->name}}</td><td>{{$sal->name}}</td><td><a href="giveap/{{$sal->user->id}}" class="btn btn-success"><i class="fa fa-check"></i></a></td></tr>
        @else
        
        @endif
          @endforeach
        </table>
      </div>
      </div>
    </div>
  </section>  
  @endsection
  <!-- <link rel="stylesheet" href="{{-- asset('css\app.css') --}}"> -->
