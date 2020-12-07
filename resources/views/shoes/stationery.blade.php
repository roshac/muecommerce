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
    <div class="col-md-4">
        <div class="card">
            <img src="{{ URL::asset('storage/ladies.jpg')}}" width="auto" height="300" style=""/>
        </div>

    </div>
    <div class="col-md-4">
        <div class="card">
            <img src="{{ URL::asset('storage/ladies.jpg')}}" width="auto" height="300" style=""/>

        </div>
</div>
</div>
<div style="text-align: center; padding-top:2rem">
    <h2><b> <i class="fa fa-grip-lines"></i> STATIONERY</b> <i class="fa fa-grip-lines"></i></h2>
  </div>
<div class="row">
@foreach ($stat as $cloth)
@if ($cloth->category->name == 'Shoes')
<div class="col-md-3" style="margin-left: 0.0%">
    <div class="card" style="width: 300px; margin-left: 1%">
        <a href="/itemdetail/{{$cloth->id}}"><img src="{{ URL::asset('storage/' . $cloth->photo) }}" width="299px" height="300px" style=""/></td></a>
       <div style="padding: 3px">
        <strong>{{$cloth->name}}</strong>
        <hr>
        <p>{!!$cloth->description!!}</p>
    </div>
    </div> 


</div>
@endif
@endforeach
</div>
<br>
@extends('footer')

