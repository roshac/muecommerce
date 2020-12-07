@extends('layouts.app')
@section('content')
<div class="content">
    @include('adminlte-templates::common.errors')
<div class="row"> 
    <div class="col-md-6">
    <div class="card">
        <header class="card-header">
            <strong class="d-inline-block mr-3">MY ADDRESS</strong>
        </header>
       @foreach ($address as $add)
       <div class="col-md-6" style="padding: 2%">
       <div class="card card-primary">
           <div class="card-header">Address</div>
           <div class="card-body">
       <h6>Location: {{$add->location}}</h6>
       <h6>Phone No: {{$add->phone_no}}</h6>

    </div>
       </div>
        </div>
       @endforeach
              
              
    </div> <!-- order-group.// -->
    </div>
    <div class="col-md-6">
        <div class="card">
            <header class="card-header">
                <strong class="d-inline-block mr-3">ADD NEW ADDRESS</strong>
            </header>
           
                  
                  
        </div> <!-- order-group.// -->
        </div>
</div>
</div>
@endsection
