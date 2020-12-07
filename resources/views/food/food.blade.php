@include('wel')
<br>
<div class="row">
    <div class="col-md-2">
        <div class="card border-info mb-2" style="max-width: ; margin-left: 1rem">
            <div class="card-header"><h5><b>Category</b></h5></div>
            <ul style="padding: 2%">
                <div style="padding: 10px">
                <li>
                    <a href="http://">Wali</a>
                </li>
                <li>
                    <a href="http://">Biriani</a>
                </li>
                <li>
                    <a href="http://">Chips</a>
                </li>
                <li>
                    <a href="http://">Ugali</a>
                </li>
            </div>
            </ul>
        </div>
        <div class="card border-info mb-2" style="max-width: ; margin-left: 1rem">
            <div class="card-header"><h5><b>Brand's</b></h5></div>
            <ul style="padding: 6px">
                <li>
                    <a href="http://">Benga Popcorn</a>
                </li>
                <li>
                    <a href="http://">Dell'a Food</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-4" style="">
        {{-- <div class="card"> --}}
        <div class="container">
        
            <img src="{{ URL::asset('storage/kuku.jpg')}}" width="109%" height="300" style=""/>
            <div class="content">
                <a href="" class="btn btn-outline-warning float-right">Shop Now</a>
                <span><h2>Gift Food</h2></span>
                <p>Pata kuku watamu wa kienyeji kwa punguzo la bei</p>
              {{-- </div> --}}
        </div>
        </div>

    </div>
    <div class="col-md-4">
        <div class="container">
        
            <img src="{{ URL::asset('storage/food.jpg')}}" width="108%" height="300" style=""/>
            <div class="content">
                <a href="" class="btn btn-outline-warning float-right">Shop Now</a>
                <span><h2>MUSO Food</h2></span>
                <p>Pata kuku watamu wa kienyeji kwa punguzo la bei</p>
              {{-- </div> --}}
        </div>
        </div>
</div>
<div class="col-md-2">
<div class="card">

    <img src="{{ URL::asset('storage/bb.jpg')}}" width="auto" height="300" style=""/>
</div>
</div>
</div>
<div style="text-align: center; padding-top:2rem">
    <h2><b> <i class="fa fa-grip-lines"></i> FOOD</b> <i class="fa fa-grip-lines"></i></h2>
  </div>
<div class="row">
@foreach ($food as $cloth)
@if ($cloth->category->name == 'Food')
<div class="col-md-3" style="margin-left: 0.0%">
    <div class="card" style="width: 300px; margin-left: 1%">
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

<link rel="stylesheet" href="{{ asset('css\style2.css')}}">