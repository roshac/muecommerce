
@extends('layouts.app')
@section('content')
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
        <span class="count-numbers">{{$op}}</span>
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
        <a href="gene">
        <div class="card-counter info">
          <i class="fa fa-edit"></i>
          <span class="count-numbers">Report</span>
          <span class="count-name">Generate</span>
        </div>
      </a>
      </div>
  
    </div>
  </div>
    </section><br>
<div class="row" style="margin-left: 1%">
  <div class="col-md-6">
    <div class="flex">
    <div class="w-1/2">
    {!! $chart->container() !!}
  </div>
  </div>
    {!! $chart->script() !!}
  </div>
  <div class="col-md-6">
    <table class="table table-striped table-responsive mt-4">
      <tr><th  colspan="7" style="text-align: center">Recent orders</th></tr>
      <tr><th>S/NO</th><th>oeder Id</th><th>Seller</th><th>Item</th><th>Qty</th><th>Status</th><th>Price</th></tr>
      @foreach ($order_dash as $key => $order)
      <tr>
     <td>{{++$key}}</td><td>{{$order->order_id}}</td><td>{{$order->products->user->name}}</td><td><small>{{$order->products->name}}</small></td><td>{{$order->quantity}}</td>
      
        @if($order->status->name ==='Order confirmed')
        <td><span  class="badge badge-primary">{{$order->status->name}}</span></td>
      @endif
      @if($order->status->name ==='Received')
        <td> <span class="badge badge-secondary">{{$order->status->name}}</span></td>
      @endif
      @if($order->status->name ==='On the way')
        <td ><span class="badge badge-warning">{{$order->status->name}}</span></td>
      @endif
      @if($order->status->name ==='Ready for pickup')
        <td ><span class="badge badge-success">{{$order->status->name}}</span></td>
      @endif
      @if($order->status->name ==='Picked by courier')
        <td ><span class="badge badge-info">{{$order->status->name}}</span></td>
      @endif
      
      <td>@convert($order->price)</td>
      </tr>
          
      @endforeach
    </table>
    
  </div>

</div>
@endsection



