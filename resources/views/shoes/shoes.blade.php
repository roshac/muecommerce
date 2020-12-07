@include('wel')
<br>
<div class="row">
    <div class="col-md-2">
        
    </div>
    <div class="col-md-4">
        <div class="card">
            <img src="{{ URL::asset('storage/6R6vny3DF7dDuik2Uxt98YKS3fIZifu49sREDmK9.jpeg')}}" width="auto" height="300" style=""/>
        </div>

    </div>
    <div class="col-md-4">
        <div class="card">
            <img src="{{ URL::asset('storage/ladies.jpg')}}" width="auto" height="300" style=""/>

        </div>
</div>
</div>
<div style="text-align: center; padding-top:2rem">
    <h2><b> <i class="fa fa-grip-lines"></i> SHOES</b> <i class="fa fa-grip-lines"></i></h2>
  </div>
<div class="row">
@foreach ($shoes as $cloth)
@if ($cloth->category->name == 'Shoes')
<div class="col-md-3" style="padding: 15px">
    <div class="card" style="width: 300px; margin-left: 1%;">
        <a href="/itemdetail/{{$cloth->id}}"><img src="{{ URL::asset('storage/' . $cloth->photo) }}" width="299px" height="300px" style=""/></td></a>
       <div style="padding: 3px"><br>
        <strong>{{$cloth->name}}</strong>
        
        <p>{!!$cloth->description!!}</p>
    </div>
    <div class="card-footer  border-info price">
        <span> <h6><b>Tsh:</b><span><b>{{$cloth->price}}</b></span></h6>
        <small class="free">Free Shipping</small></span>
        <span><a href="/add_to_cart/{{$cloth->id}}" class="btn btn-outline-info" style="float:right;margin-top: -15px;">Order Now</a></span>
      </div>
    </div> 
</div>
@endif
@endforeach
</div>
<br>
@extends('footer')

