
@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        {{-- @foreach ($a_user as $item)
             <strong>Bids For {{$item->auction->name}}</strong>  
        @endforeach
       --}}
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
   
            <table class="table table-striped" style="width: 100%">
                <tr><th>S/NO</th><th>Bidder</th><th>Start Price</th><th>Bid Ammount</th><th>Date</th><th>Action</th></tr>
                @foreach ($my_bid  as $key => $produc)
                <tr>
                    
                    <td>{{++$key}}</td>
                    <td>{{$produc->user->name}}</td>
                    <td>{{$produc->auction->starting_price}}</td>
                    <td><span>Tsh</span> <strong>{{$produc->fee_paid}} </strong></td>
                    <td>{{$produc->created_at}} </td>
                    
                    <td>
                        {!! Form::open(['route' => ['roles.destroy', $produc->id], 'method' => 'delete']) !!}
                        
                            <a href="{{URL::asset('approve/'. $produc->id)}}" class='btn btn-success btn-xs'><i class="fa fa-check" style=""></i></a>
                            
                            {!! Form::button('<i class="fa fa-times"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </table>
       
</div>
@endsection
