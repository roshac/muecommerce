@include('wel')
<br>
<div class="row" style="margin-left: 10%">
    
    <div class="col-md-5">
        <div class="card">
            <img src="{{ URL::asset('storage/ladies.jpg')}}" width="auto" height="300" style=""/>
        </div>

    </div>
    <div class="col-md-5">
        <div class="card">
            <img src="{{ URL::asset('storage/ladies.jpg')}}" width="auto" height="300" style=""/>

        </div>
</div>
</div>
<div style="text-align: center; padding-top:2rem">
    <h2><b> <i class="fa fa-grip-lines"></i> BEAUTY</b> <i class="fa fa-grip-lines"></i></h2>
  </div>
<div class="row">
@foreach ($beauty as $cloth)
@if ($cloth->category->name == 'Beauty')
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

