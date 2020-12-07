
@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        <strong>FeedBack</strong> 
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <table class="table table-striped" id="examplee" style="width: 100%">
        <thead>
            <tr><th>S/NO</th><th>Product Name</th><th>Product Photo</th><th>Saller Name</th><th>Feedback</th></tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($feed as $key => $produc)
                <td>{{++$key}}</td>
                <td>{{$produc->auction_name}}</td>
                <td> <img src="{{ URL::asset('storage/'.$produc->photo) }}" width="40px" height="40px"/></td>  
                <td>{{$produc->user->name}}</td>
                <td>{{$produc->feedback}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
<script type="application/javascript">
    $(document).ready(function() {
        $('#examplee').DataTable();
    } );
</script>
<script src="{{asset('js\app.js')}}" defer></script>
<script type="application/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="application/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

@endsection
