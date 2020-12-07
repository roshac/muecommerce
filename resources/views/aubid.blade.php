
@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        <strong>Approve</strong>
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
   
            <table class="table table-striped" style="width: 100%">
                <tr><th>S/NO</th><th>Bidder</th><th>Start Price</th><th>Bid Ammount</th><th>Date</th><th>Action</th></tr>
                @foreach ($a_user  as $key => $produc)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$produc->user->name}}</td>
                    <td>Tsh: @convert($produc->auction->starting_price)</td>
                    <td><span>Tsh: </span> <strong>@convert($produc->fee_paid) </strong></td>
                    <td>{{$produc->created_at}} </td>
                    
                    <td>                      
                     <a href="{{URL::asset('approve/'. $produc->id.'/'.$produc->user->id)}}" class='btn btn-success btn-xs'><i class="fa fa-check" style=""></i></a>   
                    </td>
                </tr>
                @endforeach
            </table>
       
</div>
@endsection
