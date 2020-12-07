@extends('layouts.app')
@section('content')
<div class="content">
@include('adminlte-templates::common.errors')
<article class="card">
<header class="card-header">
<strong class="d-inline-block mr-3">Bid ID: {{$detail->id}}</strong>
<span>Bid Date: {{$detail->created_at->format('d M. Y')}}</span>
</header>
<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <h6 class="text-muted">Delivery to</h6>
            <p>{{ $detail->user->name }} <br>
                Phone {{ $detail->contact->phone_no }} Email: {{ $detail->user->email }} <br>
                Location: {{ $detail->contact->location }} <br>
            </p>
        </div>
        <div class="col-md-4">
            <span>
                <form action="{!!URL::to('bidkposta?_method=PUT')!!}" method="POST">
                    @csrf
                    <input type="text" name="name" value="{{ $detail->user->name }}" hidden>
                    <input type="text" name="id" value="{{$detail->id}}" hidden> 
                    <input type="text" name="email" value="{{ $detail->user->email }}" hidden>
                    <input type="text" name="phone" value="{{$detail->contact->phone_no }}" hidden>
                    <label for="feed"><strong>Postal Code</strong></label>
                    <textarea class="form-control" placeholder="Put Package Postal here" name="feed" id="" cols="6" rows="2"></textarea><br>
                    <input type="submit" value="Send" class="btn btn-facebook float-right">
                </form>
            </span>
        </div>
    </div> <!-- row.// -->
</div> <!-- card-body .// -->

<table class="table table-striped table-responsive-lg" >
    <tbody>      
        <tr>
            <td width="auto">
                <img src="{{ URL::asset('storage/' . $detail->photo) }}" class="img-xs border">
            </td>
            <td>
                <p class="title mb-0">{{$detail->auction_name }} </p> 
                <var class="price">Tsh @convert($detail->starting_price)</var>
            </td>
            <td>
                Fee Paid<br>                               
                <var class="price">Tsh: {{ $detail->fee_paid}}</var>
            </td>
            <td>
                Status<br>                               
                {{ $detail->status->name}}
            </td>
            <td > <form action="{{URL::asset('updatestatusbid/'. $detail->id . '?_method=PUT' )}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="row">
                    <input type="hidden" name="" _method="PUT">
                        <label for="status" class="col-md-6">Change Order Status</label>
                    </div>
                        <div class="row" >
                        <select id="status" name="status" class="form-control col-md-6">
                            <option value="">Select Status</option> 
                             @foreach($status as $status) 
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach 
                        </select>
                       
                        <input type="submit" name="Change Status" class="btn btn-primary " style="margin-left: 4%">
                    </div>
                    
                    </div>
            </form></td>
            <td><p> Label</p>
                <a href="{{URL::asset('sticker_bid/'. $detail->id)}}" class="btn btn-success but">Sticker</a></td>
            </tr>
        </tbody></table>  
    </article> <!-- order-group.// -->
</div>
@endsection
