
@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 style="text-align: center">
        <strong>My Pakage</strong>
    </h1>
    <hr>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    
    <table class="table table-striped" id="example" style="width: 100%">
        <thead>
        <tr><th>S/NO</th><th>Winner</th><th>Product</th><th>Start Price</th><th>Fee Paid</th><th>Date</th><th>Action</th></tr>
    </thead><tbody>
        @foreach ($won  as $key => $produc)
        <tr>
            
            <td>{{++$key}}</td>
            <td>{{$produc->user->name}}</td>
            <td>{{$produc->auction_name}}</td>
            <td>{{$produc->starting_price}}</td>
            <td><span>Tsh</span> <strong>{{$produc->fee_paid}} </strong></td>
            <td>{{$produc->created_at}} </td>
            
            <td>
                <a href="{{URL::asset('bid_track/'. $produc->id)}}" class='btn btn-success btn-xs'><i class="fa fa-eye" style=""></i> Track</a>   
            </td>
        </tr>
    </tbody>
        @endforeach
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
