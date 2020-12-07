@extends('layouts.app')
@section('content')
<div class="content">
@include('adminlte-templates::common.errors')
<div class="card">
<header class="card-header"> My Package / Tracking </header>
<div class="card-body">
    <h6><b>Order ID: <span style="color: red">MU-Eco# {{ $track->id }}</b></span></h6>
    <div class="card">
        <div class="card-body row no-gutters">
            <div class="col">
                <strong>Delivery Estimate time:</strong> <br>{{ $track->created_at->addHour('24')->format('d M. Y')}}
            </div>
            <div class="col">
                <strong>Shipping Brand:</strong> <br> {{ $track->name}}
            </div>
            <div class="col">
                <strong>Status:</strong> <br> {{$track->status->name}}
            </div>
            <div class="col">    
                <strong>Phone Number #:</strong> <br> 
                {{$track->contact->phone_no}}
            </div>
        </div>
    </div>
    <bid-track status_id="{{$track->status_id}}" status_name="{{$track->status->name}}" bid_id="{{ $track->id }}"></bid-track>
    <hr>           
    <div class="row">
        <div class="col-md-6">
            <figure class="itemside  mb-3">
                <div class="aside"> <img src="{{ URL::asset('storage/' . $track->photo) }}" class="img-md border"></div>
                <figcaption class="info align-self-center">
                    <p class="title">{{ $track->name }}<br> {{ $track->user->name }}</p>
                    <span class="text-muted">Tsh {{ $track->fee_paid }} </span>
                </figcaption>
            </figure>
            </div>
            @if ($track->status_id == '5')
            <div class="col-md-6">
                <form action="{!!URL::to('feedbackbid?_method=PUT')!!}" method="POST">
                    @csrf
                    <input type="text" name="id" value="{{$track->id}}" hidden> 
                    <label for="feed"><strong>FeedBack</strong></label>
                    <textarea class="form-control" placeholder="Put Your Feedback here" name="feed" id="" cols="7" rows="3"></textarea><br>
                    <input type="submit" value="Send" class="btn btn-facebook float-right">
                </form>
            </div>          
            @endif
        </div>
        
        <p><strong>Note: </strong>Please Check your Product before paying. Returning are not allowerd
            once you are paying means you are sartified with the product. <b>Thank you for choosing us<b></p>
                
                <a href="#" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Back to orders</a>
            </div> <!-- card-body.// -->
        </div>
        
    </div>
    @endsection
    
    <script src="{{asset('js\app.js')}}" type="application/javascript" defer></script>
    
    
