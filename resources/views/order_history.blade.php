@extends('layouts.app')
@section('content')
<div class="content">
@include('adminlte-templates::common.errors')
<article class="card">
<header class="card-header">
    <strong class="d-inline-block mr-3">Order ID: 61</strong>
    <span>Order Date: </span>
</header>
<div class="card-body">
    <div class="row">
        <div class="col-md-8">
            <h6 class="text-muted">Delivery to</h6>
            @foreach ($detail as $detail)
            <p>{{ $detail->user->name }} <br>
                Phone {{ $detail->contact->phone_no }} Email: {{ $detail->user->email }} <br>
                Location: {{ $detail->contact->location }} <br>
            </p>
        </div>
        <div class="col-md-4">
            <span>
                
                
            </span>
        </div>
    </div> <!-- row.// -->
</div> <!-- card-body .// -->

<table class="table table-striped table-responsive-lg" >
    <tbody>
        @foreach ($order_product->order_products as $order_product) 
        @if ($order_product->user_id == Auth::User()->id)
        
        <tr>
            <td width="auto">
                <img src="{{ URL::asset('storage/'.$order_product->products->photo) }}" class="img-xs border">
            </td>
            <td>
                <p class="title mb-0">{{$order_product->products->name }} </p> 
                <var class="price">Tsh {{ $order_product->price }}</var>
            </td>
            <td>
                Quantity<br>                               
                <var class="price">Set: {{ $order_product->quantity}}</var>
            </td>
            <td> Seller <br> {{ $order_product->products->user->name }} </td>
            <td>
                Status<br>                               
                {{ $order_product->status->name}}
            </td>
            <td><form action="{{URL::asset('postcode/'. $order_product->id .'/'.$order_product->order_id. '?_method=PUT' )}}" method="POST">
                @csrf
                <input type="text" name="code" placeholder="code" class="form-control col-md-8"><br>
                <input type="submit" value="Postal Code" class="btn btn-dark">
                </form>
            </td>
            <td > <form action="{{URL::asset('updatestatus/'.$order_product->id .'/'.$order_product->order_id.'?_method=PUT')}}" method="POST">
                @csrf
                @include('statusupdate')
            </form></td>
            <td><p> Label</p>
                <a href="{{URL::asset('sticker/'. $order_product->order_id)}}" class="btn btn-success but">Sticker</a></td>
            </tr>
            @else
            
            @endif
            @endforeach
            @endforeach
        </tbody></table>  
    </article> <!-- order-group.// -->
</div>
@endsection
