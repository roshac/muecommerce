@extends('layouts.app')

@section('content')
<section class="content-header">
<h5>
    <b> RECEIVED ORDERS</b>
</h5>
</section>
<div class="content">
@include('adminlte-templates::common.errors')

<table id="example" class="table table-striped table-responsive-md">
    <thead>
    <tr><th>S/NO</th><th>Oder Number</th><th>Customer Name</th><th>Status</th><th>Total Ammount</th><th>Created At</th><th>view</th></tr>
    </thead>
    <tbody>
    @foreach ($orders as  $key => $order)
    <tr>
        <td>{{++$key}}</td><td>{{ $order->id }}</td><td>{{$order->user->name}}</td><td>Paid</td><td>Tsh @convert($order->total_price)</td><td>{{ $order->created_at->format('d M. Y')}}</td>
        <td><a href="order_history/{{$order->id}}" class="btn btn-primary">View</a></td>
        
    </tr>
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





