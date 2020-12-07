@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        MY ORDERS
    </h1>
</section>
<div class="content">
    {{-- @include('adminlte-templates::common.errors') --}}
    {{-- <div class="card"> --}}
        <table id="example" class="table table-striped table-bordered" width="100%">
            <thead>
            <tr><th>S/NO</th><th>Oder Number</th><th>Products</th><th>Status</th><th>Total Ammount</th><th>Created At</th><th>view</th></tr>
        </thead>
        <tbody>
            @foreach ($order as  $key => $orders)
            @foreach ($orders->products as $product)
            
            <tr>
            <td>{{++$key}}</td><td><b>MU-Eco#: {{ $orders->id }}</b><td>{{$product->name}}</td></td><td>Paid</td><td>Tsh @convert($orders->total_price)</td><td>{{ $orders->created_at->format('d M. Y')}}</td>
                <td><a href="{{URL::asset('order_track/'.$orders->id)}}" class="btn btn-primary">Track</a></td>
            </tr>
        
            @endforeach
            @endforeach
        </tbody> 
        </table>
        {{-- {{ $order->links() }} --}}
    {{-- </div> <!-- card-body. --> --}}
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






