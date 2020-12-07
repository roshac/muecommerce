@extends('layouts.app')
@section('content')
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="row"> 
        <div class="col-md-6">
            <div class="card">
                <header class="card-header">
                    <strong class="d-inline-block mr-3">Choose Days</strong>
                </header>
                <form action="salesrepo" method="POST">
                    @csrf
                    <div class="row"  style="padding: 2%">
                        <div class="col-md-8">
                            @include('flash::message')
                        </div>
                        <div class="form-group col-md-6">
                            <label for="area">Start Date</label>
                            <input class="form-control" type="date" name="start_date">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">End Date</label>
                            <input class="form-control" type="date" name="end_date">
                        </div>
                        <div class="form-grouo col-6">
                            <input type="submit" value="Print" class="btn btn-primary">
                        </div>  
                    </div>    
                </form>
            </div> <!-- order-group.// -->
        </div>
    </div>
    
</div>
@endsection
