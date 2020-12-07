@extends('layouts.app')
@section('content')
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="row"> 
        <div class="col-md-6">
            <div class="card">
                <header class="card-header">
                    <strong class="d-inline-block mr-3">ADD NEW REGION</strong>
                </header>
                <form action="region" method="POST">
                    @csrf
                    <div class="row"  style="padding: 2%">
                        <div class="col-md-8">
                            @include('flash::message')
                        </div>
                        <div class="form-group col-md-6">
                            <label for="area">Region Name</label>
                            <input class="form-control" type="tect" name="name" placeholder="Morogoro">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Shiping Cost</label>
                            <input class="form-control" type="text" name="price" placeholder="5000">
                        </div>
                        <div class="form-grouo col-6">
                            <input type="submit" value="Save Region" class="btn btn-primary">
                        </div>  
                    </div>    
                </form>
            </div> <!-- order-group.// -->
        </div>
        <div class="col-md-6">
            <div class="card">
                <header class="card-header">
                    <strong class="d-inline-block mr-3">ADD NEW ADDRESS</strong>
                </header>
                <div class="row"  style="padding: 2%">
                    <div class="form-group col-md-6">
                        <label for="area">Region Name</label>
                        <input class="form-control" type="tect" name="area" placeholder="Morogoro">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">Shiping Cost</label>
                        <input class="form-control" type="phone" name="phone" placeholder="5000">
                        
                    </div>
                    <div class="form-grouo col-6">
                        <input type="submit" value="Save Region" class="btn btn-primary">
                    </div>  
                </div>    
            </div> <!-- order-group.// -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Launch demo modal
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
