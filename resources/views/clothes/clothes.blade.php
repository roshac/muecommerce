@include('wel')
<br>
<div class="row">
    <div class="col-md-2">
        <div class="card border-info mb-2" style="max-width: ; margin-left: 1rem">
            <div class="card-header"><h5><b>Category</b></h5></div>
            <ul>
                <li>
                    <a href="http://">Men</a>
                </li>
                <li>
                    <a href="http://">Women</a>
                </li>
            </ul>
        </div>
        <div class="card border-info mb-2" style="max-width: ; margin-left: 1rem">
            <div class="card-header"><h5><b>Brand's</b></h5></div>
            <ul>
                <li>
                    <a href="http://">Neem Fashion</a>
                </li>
                <li>
                    <a href="http://">Calisto Fahion</a>
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
    <h2><b> <i class="fa fa-grip-lines"></i> CLOTHES</b> <i class="fa fa-grip-lines"></i></h2>
  </div>
<div class="row">
@foreach ($clothes as $cloth)
<div class="col-md-3" style="padding: 15px">
    <div class="card">
        <a href="/itemdetail/{{$cloth->id}}"><img src="{{ URL::asset('storage/' . $cloth->photo) }}" width="312.2px" height="300px" style=""/></td></a>
       <div style="padding: 3px">
        <strong>{{$cloth->name}}</strong>
        <hr>
        <p>{!!$cloth->description!!}</p>
    </div>
    </div> 


</div>
@endforeach
</div>
<br>
@extends('footer')

