@extends('layouts.app')
@section('content')
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="card">
        <header class="card-header"> My Orders / Tracking </header>
        <div class="card-body">
            @foreach ($order_track as $track) 
            
            <h6><b>Order ID: <span style="color: red">MU-Eco# {{ $track->order_id }}</b></span></h6>
            <div class="card">
                <div class="card-body row no-gutters">
                    <div class="col">
                        <strong>Delivery Estimate time:</strong> <br>{{ $track->created_at->addHour('24')->format('d M. Y')}}
                    </div>
                    <div class="col">
                        <strong>Shipping Brand:</strong> <br> {{ $track->products->user->name}}
                    </div>
                    <div class="col">
                        <strong>Status:</strong> <br> {{$track->status->name}}
                    </div>
                    <div class="col">
                        
                        <strong>Phone Number #:</strong> <br> 
                        @foreach ($track->user->contact as $con)
                        {{$con->phone_no}}
                        @endforeach
                    </div>
                </div>
            </div>
            <order-track status_id="{{$track->status_id}}" status_name="{{$track->status->name}}" order_id="{{ $track->order_id }}"></order-track>
            <hr>
            
            {{-- <div style="display:inline-block"> --}}
                <div class="row">
                    <div class="col-md-6">
                        <figure class="itemside  mb-3">
                            <div class="aside"> <img src="{{ URL::asset('storage/' . $track->products->photo) }}" class="img-md border"></div>
                            <figcaption class="info align-self-center">
                                <p class="title">{{ $track->products->name }}<br> {{ $track->products->user->name }}</p>
                                <span class="text-muted">Tsh {{ $track->products->price }} </span>
                            </figcaption>
                        </figure>
                    </div>
                    @if ($track->status_id == '5')
                    <div class="col-md-6">
                        <form action="{!!URL::to('feedback')!!}" method="POST">
                            @csrf
                            <input type="text" name="id" value="{{$track->id}}" hidden> 
                            <label for="feed"><strong>FeedBack</strong></label>
                            <textarea class="form-control" placeholder="Put Your Feedback here" name="feed" id="" cols="7" rows="3"></textarea><br>
                            <input type="submit" value="Send" class="btn btn-facebook float-right">
                        </form>
                    </div>          
                    @endif
                </div>
                {{-- </div> --}}
                
                @endforeach
                
                <p><strong>Note: </strong>Please Check your order before paying. Returning are not allowerd
                    once you are paying means you are sartified with the product. <b>Thank you for choosing us<b></p>
                        
                        <a href="#" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Back to orders</a>
                    </div> <!-- card-body.// -->
                </div>
                
            </div>
            @endsection
            
            <script src="{{asset('js\app.js')}}" type="application/javascript" defer></script>
            
            
