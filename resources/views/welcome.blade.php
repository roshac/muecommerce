@include('wel')
<br>
<div id='bid'>
<div class="card border-info mb-3 wel tatu" style="">
  <div class="card-header"><h5><b>Categories</b></h5></div>
  <ul>
    <li>
      <a href="clothes">Clothes</a>
    </li>
    <li>
      <a href="stat">Stationey</a>
    </li>
    <li>
      <a href="shoes">Shoes</a>
    </li>
    <li>
      <a href="eletronics">Eletronics</a>
    </li>
    <li>
      <a href="food">Food</a>
    </li>
    <li>
      <a href="bags">Bags</a>
    </li>
    <li>
      <a href="beauty">Beauty</a>
    </li>
  </ul>
  
</div>
<div class="card border-info mb-3 wel pili" style="">
  <div class="card-header"><h5><b>Brands</b></h5></div>
  <ul>
    <li>
      <a href="http://">Benga Popcorn</a>
    </li>
    <li>
      <a href="http://">De'la Boss</a>
    </li>
    <li>
      <a href="http://">Calisto Fashion</a>
    </li>
    <li>
      <a href="http://">Neema Beauty</a>
    </li>
    <li>
      <a href="http://">Malafiale</a>
    </li>
    <li>
      <a href="http://">Njoroge</a>
    </li>
    <li>
      <a href="http://">Gift Food</a>
    </li>
    
  </ul>
</div>

<?php $count=0;?>
<div style="" class="bana">
  <div class="row" >
    <div class="col-md-8">
      <!-- ============================ COMPONENT BANNER 7 ================================= -->
      <div id="demo" class="carousel slide" data-ride="carousel">
        
        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
          <li data-target="#demo" data-slide-to="3"></li>
        </ul>
        
        <!-- The slideshow -->
        <div class="carousel-inner" >
          <div class="carousel-item active">
            <img src="{{URL::asset('storage/hh.png')}}" alt="Los Angeles" height="298px" width="100%" class="mj">
          </div>
          <div class="carousel-item">
            <img src="{{URL::asset('storage/ms.jpg')}}" alt="Los Angeles" height="298px" width="100%" class="mj">
          </div>
          <div class="carousel-item">
            <img src="{{URL::asset('storage/bea.png')}}" alt="Los Angeles" height="298px" width="100%" class="mj">
          </div>
          <div class="carousel-item">
            <img src="{{URL::asset('storage/bea.png')}}" alt="Los Angeles" height="298px" width="100%" class="mj">
          </div>
        </div>
        
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
        
      </div>

<!--  COMPONENT BANNER -->
</div> <!-- col.// -->

<div class="col-md-4 pp">
  <div class="card-banner" style="height:298px; background-image: url({{ URL::asset('storage/hh.jpeg')}});">
    <article class="caption bottom">
      <h5 class="card-title">De'La Boss Quality</h5>
      <p>Pata Taulo za kike Sandles za kimasai vocha za aina zote Tuko uswazi chini mkabala na Gift f.</p>
    </article>
  </div>
</div>
</div> <!-- row.// -->
</div>
<div style="" class="picha">
  <article class="card card-body">
    <div class="row">
      <div class="col-md-4">
        <figure>
          <span class="text-primary"><i class="fa fa-2x fa-truck"></i></span>
          <figcaption class="pt-3">
            <h5 class="title">Fast delivery</h5>
            <p>We do Fast delivery soon as when you press the order minimum of 24 hours </p>
          </figcaption>
        </figure> <!-- iconbox // -->
      </div><!-- col // -->
      <div class="col-md-4">
        <figure>
          <span class="text-primary"><i class="fa fa-2x fa-money"></i></span>
          <figcaption class="pt-3">
            <h5 class="title">Resonable Price</h5>
            <p>Our price is resonable width full of discount and promotions
            </p>
          </figcaption>
        </figure> <!-- iconbox // -->
      </div><!-- col // -->
      <div class="col-md-4">
        <figure>
          <span class="text-primary"><i class="fa fa-2x fa-lock"></i></span>
          <figcaption class="pt-3">
            <h5 class="title">High secured </h5>
            <p>All contents are secured with end to end encryption fell safe when you are using Mu-Ecommerce
            </p>
          </figcaption>
        </figure> <!-- iconbox // -->
      </div> <!-- col // -->
    </div>
  </article> <!-- card.// -->
</div>
<div style="text-align: center; padding-top:2rem">
  <h2><b> <i class="fa fa-grip-lines"></i> NEW PRODUCTS</b> <i class="fa fa-grip-lines"></i></h2>
</div>

  
  @foreach($product as $products)
  {{-- <ul style=""> --}}
    {{-- @foreach ($products as $products) --}}
    {{-- @if ($products->company =='0') --}}
    
    <li class="list kku" style="margin-left: 1%">
      <div class="card border-info" class="kadi">
        <a href="/itemdetail/{{$products->id}}"><img src="{{ URL::asset('storage/' . $products->photo) }}" width="267px" height="242x" style=""/></td></a>
        <b>
          <div class="text">
            <h6><b>{{$products->name}}</b></h6>
          </b>
          <p>{!!$products->description!!}</p>
          <div class="card-footer  border-info price">
            <span> <h6><b>Tsh:</b><span><b>@convert($products->price)</b></span></h6>
            <small class="free">Free Shipping</small></span>
            <span><a href="/add_to_cart/{{$products->id}}" class="btn btn-outline-info" style="float:right;margin-top: -15px;">Order Now</a></span>
            {{-- <button type="button" class="btn btn-primary float-right" style="margin-top: -15px;" data-toggle="modal" data-target="#exampleModal">
              Order Now
            </button> --}}
            
          </div>
        </div>
      </li>
      {{-- @endif --}}
      {{-- @endforeach --}}
    {{-- </ul> --}}
    @endforeach

  <div style="text-align: center; padding-top:1rem;">
    <h2><b> <i class="fa fa-grip-lines"></i> ITEMS IN AUCTION</b> <i class="fa fa-grip-lines"></i></h2>
  </div>
  
  @foreach ($auction->chunk(4) as $cloth)
  <ul>
    @foreach($cloth as $cloth)
    
    
    <li  style="margin-left: 0.0%; text-decoration: none; padding: 3%; display:inline-block;">
      <div class="card" style="width: 350px; margin-left: 3%;">
        <a href="/auctiondetail/{{$cloth->id}}"><img src="{{ URL::asset('storage/' . $cloth->photo) }}" width="350" height="300px" style=""/></td></a>
        <div style="padding: 3px"><br>
          <strong>{{$cloth->name}}</strong>
          
        <bid-price auction_id="{{$cloth->id}}" end="{{$cloth->skus_count}}"></bid-price>
          <p>{!!$cloth->description!!}</p>
        </div>
        <hr>
        <span style="padding: 2%"> <h6><small>Start Price</small> <b>Tsh:</b><span><b>@convert($cloth->starting_price)</b></span><span class="float-right"><small>Current bid </small><b>Tsh:</b><span><b>@convert($cloth->skus_count)</b></span></h6></span>
        <div class="card-footer  border-info price">
          
          <span> <h6 style="color: red"><b> <div data-countdown={{$cloth->deadline}}></div></b></span></h6>
          
          <hr>
          <small class="free">Free Shipping</small></span>
          <button type="button" class="btn btn-primary float-right" style="margin-top: -11px;" data-toggle="modal" data-target="#exampleModal{{$cloth->id}}">
            Bid Now
          </button>
        </div>
      </div> 
      <div class="modal fade" id="exampleModal{{$cloth->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Place Bid</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="bid/{{$cloth->id}}/{{$cloth->user->id}}" method="POST">
                @csrf
                @if(session()->has('Error'))
                <div class="alert alert-danger">{{session()->get('Error')}}</div>
                @endif
                <label for="bid">Place Bid</label>
                <input type="text" name="bid" id="" class="form-control" required>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Place Bid</button>
              </form>
            </div>
          </div>
        </div>
      </bid-price> <bid-price start=@convert($cloth->starting_price) end="{{$cloth->skus_count}}" auction_id="{{$cloth->id}}"></bid-price>
    </li>
    @endforeach
  </ul>
  @endforeach
  
  
  @if(session()->has('Error'))
  <div class="alert alert-danger" style="margin-left: 30%; width: 40%">{{session()->get('Error')}}</div>
  @endif
  <div style="text-align: center; padding-top:1rem;">
    <h2><b> <i class="fa fa-grip-lines"></i> RECOMMENDED ITEMS</b> <i class="fa fa-grip-lines"></i></h2>
    
  </div>
  {{-- <div class="card card-home-category" style="margin-left: 0.8%;margin-right: 0.8%">
    <div class="row no-gutters">
      <div class="col-md-3">
        
        <div class="home-category-banner bg-light-blue">
          <h5 class="title">Machinery items for manufacturers</h5>
          <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
          <a href="#" class="btn btn-outline-primary rounded-pill">Source now</a>
          <img src="{{ URL::asset('storage/2.jpg')}}" class="img-bg">
        </div>
        
      </div> <!-- col.// -->
      <div class="col-md-9">
        <ul class="row no-gutters bordered-cols">
          <li class="col-6 col-lg-3 col-md-4">
            <a href="#" class="item"> 
              <div class="card-body">
                <h6 class="title">Pata wali kuku safi uswazi kutoka Gift food</h6>
                <img class="img-sm float-right" src="{{ URL::asset('storage/uPMimPXnb2AfRxNfIAyZn9jFv9cievXlkTNFArqq.jpeg')}}" class="img-bg"> 
                <p class="text-muted"><i class="fa fa-map-marker-alt"></i>  Uswazi Chini</p>
              </div>
            </a>
          </li>
          
        </div> <!-- col.// -->
      </div> <!-- row.// -->
    </div> <!-- card.// --> --}}
    <br>
</div>
    @extends('footer')
    <script type="application/javascript">
      $('[data-countdown]').each(function() {
        var $this = $(this), finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
          $this.html(event.strftime('Time Remaining:  %D Days %H:%M:%S'));
        });
      });
    </script>
    <script type="application/javascript"> src="{{asset('js\app.js')}}"></script>