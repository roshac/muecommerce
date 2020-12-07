
@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        <strong>MY AUCTION</strong> 
    </h1>
</section>

<div class="content">
    {{-- @include('adminlte-templates::common.errors') --}}
    {{-- @include('test') --}}
    <table id="examplee" class="table table-striped table-bordered" width="100%">
        <thead>
                <tr><th>S/NO</th><th>Name</th><th>Category</th><th>Description</th><th>Deadline</th><th>Start Price</th><th>End Price</th><th>Photo</th><th>Action</th></tr>
        </thead>
    <tbody>
                <tr>
                    @foreach ($auction  as $key => $produc)
                    <td>{{++$key}}</td>
                    <td>{{$produc->name}}</td>
                    <td>{{$produc->category->name}}</td>
                    <td>{!!$produc->desc!!}</td>
                    <td>{!!$produc->deadline!!}</td>
                    <td><span>Tsh</span> @convert($produc->starting_price) </td>
                    <td><span>Tsh</span> @convert($produc->end_price) </td>
                    <td> <img src="{{ URL::asset('storage/' . $produc->photo) }}" width="50px" height="55px"/></td>  
                    <td>
              
                        <div class='btn-group'>
                            <a href="aubid/{{$produc->id}}" class='btn btn-default btn-xs'><i class="fa fa-gavel" style="font-size: 20px"></i><span class="badge badge-light pull-right" style="font-size: 13px;color:red">{{$produc->skus_count}}</span></a>
                            <a href="{{$produc->id}}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                            <a href="AuctionDelete/{{$produc->id}}" class='btn btn-default btn-xs'><i class="fa fa-trash" style="color: red"></i></a>
                        </div>
                        {!! Form::close() !!}
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
