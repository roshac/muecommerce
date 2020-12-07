@include('wel')
<br>
<h3 style="margin-left: 13%;text-align: center"><strong>Auction Detail</strong></h3>

<div class="card" style="width: 80%;height:auto; margin-left: 12%">
  <div class="row no-gutters">
    <aside class="col-md-6">
      <article class="gallery-wrap">
        <div class="img-big-wrap">
          <div> <a href=""><img src="{{ URL::asset('storage/' . $detail->photo) }}"/></a></div>
        </div> <!-- slider-product.// -->
        <div class="thumbs-wrap">
          <a href="" class="item-thumb"> <img src="{{ URL::asset('storage/' . $detail->photo) }}"/></a>
        </div> <!-- slider-nav.// -->
      </article> <!-- gallery-wrap .end// -->
    </aside>
    <main class="col-md-6 border-left">
      <article class="content-body">
        
        <h2 class="title"> <strong>{{$detail->name}} </strong></h2><br>
        
        
        <dl class="row">
          
          
          <dt class="col-sm-3">Starting Price</dt>
          <dd class="col-sm-9"><var class="price h5">Tsh @convert($detail->starting_price) </var></dd>
          
          <dt class="col-sm-3">Current Bid</dt>
          <dd class="col-sm-9"><var class="price h5" style="color: green">Tsh @convert($detail->starting_price)</var></dd>
          <dt class="col-sm-3">Time Left</dt>
          <dd class="col-sm-9"><var class="price h5" style="color: crimson"><div data-countdown={{$detail->deadline}}></div></var></dd>
        </dl>
        <hr>
        <dl class="row">
          <dt class="col-sm-2"><var class="price h5">Saller</var></dt>
          <dd class="col-sm-3">{{$detail->user->name}}</dd>
          <dt class="col-sm-3"><var class="price h5">Company</var></dt>
          <dd class="col-sm-4">{{$detail->company->name}}</dd>
          <dt class="col-sm-3"><var class="price h5">Region</var></dt>
          <dd class="col-sm-3">{{$detail->company->region_id}}</dd>
          <dt class="col-sm-3"><var class="price h5">Location</var></dt>
          <dd class="col-sm-3">{{$detail->company->location}}</dd>
        </dl>
        <hr>
        <p>{!! $detail->desc!!} </p>
        
        
        <dl class="row">
          
          
          <dt class="col-sm-3">Free Delivery</dt>
          <dd class="col-sm-9">Mzumbe Main Campus, Changarawe, Ostabay </dd>
        </dl>
        
        <hr>
        
        
        <label for="bid">Enter Your Price</label>
        <div class="row">
          <form action="{{URL::asset('bid/'.$detail->id.'/'.$detail->user->id)}}" method="POST">
            @csrf
            <input type="text" name="bid" class="form-control "><br>
            <input type="submit" value="Bid Now" class="btn  btn-primary " style="margin-left: 2%"/>
          </form>
        </div>
      </article> <!-- product-info-aside .// -->
    </main> <!-- col.// -->
  </div> <!-- row.// --> 
</div> <!-- card.// -->

<br>
<script type="application/javascript">
  $('[data-countdown]').each(function() {
    var $this = $(this), finalDate = $(this).data('countdown');
    $this.countdown(finalDate, function(event) {
      $this.html(event.strftime('%D Days %H:%M:%S'));
    });
  });
</script>
