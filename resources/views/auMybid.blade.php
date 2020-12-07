
@extends('layouts.app')
@section('content')
<section class="content-header">
    <h1 style="text-align: center">
        
        <strong >My Bids </strong> 
        <hr>
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    
    <table id="example" class="table table-striped" style="width: 100%">
        <thead>
        <tr><th>S/NO</th><th>Saller</th><th>Product</th><th>Start Price</th><th>My Price</th><th>High Price</th><th>Date</th><th>Action</th></tr>
        </thead><tbody>
        @foreach ($my_bid  as $key => $produc)
        @foreach ($produc->auction_user as $item)
        @if ($item->user_id == Auth::user()->id)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$produc->user->name}}</td>
            <td>{{$produc->name}}</td>
            <td><span>Tsh</span> {{$produc->starting_price}}</td>
            <td><span>Tsh</span> <strong>{{$item->fee_paid}} </strong></td>
            <td><span>Tsh</span> <strong> {{$produc->skus_count}}</strong></td>
            <td>{{$item->created_at}} </td>
            <td>
                <a href="audelete/{{$item->id}}" class='btn btn btn-danger btn-xs'><i class="fa fa-times" style=""></i></a>
            </td>
            @endif
        </tr>
        
        @endforeach
        @endforeach
    </tbody>
</table>
</div>
<script type="application/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<script src="{{asset('js\app.js')}}" defer></script>
<script type="application/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="application/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

@endsection
