@extends('layouts.app')

@section('content')
    <div class="content" style="background: rgb(255, 255, 255)">
        @include('adminlte-templates::common.errors')
        <h3><b>ACTIVITY LOGS</b></h3>
       <strong><hr></strong> 
       
           
               
	<table class="table table-bordered display compact" id="example" >
		<thead>
		<tr>
			<th>No</th>
			<th>Subject</th>
			<th>URL</th>
			<th>Method</th>
			<th>Ip</th>
			
			<th>User Id</th>
			<th>Action</th>

		</tr>
	</thead><tbody>
		@if($logs->count())
			@foreach($logs as $key => $log)
			<tr>
				<td>{{ ++$key }}</td>
				<td>{{ $log->subject }}</td>
				<td class="text-success">{{ $log->url }}</td>
				<td><label class="label label-info">{{ $log->method }}</label></td>
				<td class="text-warning">{{ $log->ip }}</td>
				
				<td>{{ $log->user_id }}</td>
				<td><button class="btn btn-danger btn-sm">Delete</button></td>
			</tr>
		
			@endforeach
		</tbody>
		@endif
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
