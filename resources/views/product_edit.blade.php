@extends('layouts.app')
@section('content')
<section class="content-header">
    <h1>
       <strong>EDIT PRODUCT</strong> 
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="clearfix"></div>
    @include('flash::message')
    <div class="clearfix"></div>
    <div class="box box-primary">
        {{-- <strong style="text-align: center">ADD PRODUCT</strong>  --}}
        <div class="box-body">
            <form action="{{URL::asset('updateprod/'.$edit->id.'?_method=PUT' )}}"  method="POST" enctype="multipart/form-data" style="margin-left: 2%; ">
                <div class="form-row">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="name">Product Name</label>
                    <input type="text" name="name" value="{{$edit->name}}" class="form-control" placeholder="Enter product name"><br>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price">Product Price</label>
                    <input type="text" name="price" value="{{$edit->price}}" class="form-control"placeholder="Enter price"><br>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="categories">Catecory</label>
                        <select id="categories" name="categories" class="form-control">
                            <option value="">Select Categoty</option>
                            @foreach($categories as $categories)
                            <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="brand">Brand Name</label>
                        <select id="brand" name="brand" class="form-control">
                            <option value="">Select Brand</option>
                            @foreach($compan as $compan)
                            <option value="{{ $compan->id }}">{{ $compan->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="custom-file">
                    <input type="file" name="photo" value="{{$edit->photo}}" >
                        <label for="customFile">Choose file</label>
                      </div>
                    <label for="description">Product Description</label>
                    <div  style="margin-top: 2%">
                        
                    <textarea class="description" name="description" value="{{$edit->description}}" style="margin-top: 10%"></textarea>
                    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
                    </div>
                    <script>
                        tinymce.init({
                            selector:'textarea.description',
                            width: 935,
                            height: 300
                        });
                    </script>
                </div>
                <br><br>
                <input class="btn btn-primary " type="submit" value="Add Product" style="float: right">
            </form>
        </div>
    </div>
</div>
@endsection
