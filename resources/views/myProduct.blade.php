
@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        <strong>MY PRODUCTS</strong> 
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
   
            <table class="table table-striped" id="examplee" style="width: 100%">
                <thead>
                <tr><th>S/NO</th><th>Name</th><th>Category</th><th>Description</th><th>Price</th><th>Photo</th><th>Action</th></tr>
                </thead>
                <tbody>
                <tr>
                    @foreach ($product as $key => $produc)
                    <td>{{++$key}}</td>
                    <td>{{$produc->name}}</td>
                    <td>{{$produc->category->name}}</td>
                    <td>{!!$produc->description!!}</td>
                    <td>{{$produc->price}} <span>Tsh</span></td>
                    <td> <img src="{{ URL::asset('storage/' . $produc->photo) }}" width="50px" height="55px"/></td>  
                    <td>
                        <div class='btn-group'>
                        
                            
                        <a href="itemdetail/{{$produc->id}}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                        <a href="predit/{{$produc->id}}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                        <a href="prdelete/{{$produc->id}}" class='btn btn-default btn-xs'><i class="fa fa-trash" style="color: red"></i></a>
                        </div>
                    </td>
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
