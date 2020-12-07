@include('wel')
<br>
<h3 style="margin-left: 15%;text-align: center"><strong>Product detail</strong></h3>

  <div class="card" style="width: 80%;height:auto; margin-left: 15%">
    <div class="row no-gutters">
      <aside class="col-md-6">
        <article class="gallery-wrap">
          <div class="img-big-wrap">
            <div> <a href=""><img src="{{ URL::asset('storage/' . $productt->photo) }}"/></a></div>
          </div> <!-- slider-product.// -->
          <div class="thumbs-wrap">
            <a href="" class="item-thumb"> <img src="{{ URL::asset('storage/' . $productt->photo) }}"/></a>
            
          </div> <!-- slider-nav.// -->
        </article> <!-- gallery-wrap .end// -->
      </aside>
      <main class="col-md-6 border-left">
        <article class="content-body">

          <h2 class="title"> {{$productt->name}} </h2><br>


          <div class="mb-3">
            <var class="price h4">Tsh @convert($productt->price) </var>
            <span class="text-muted">/per 1 set</span>
          </div> <!-- price-detail-wrap .// -->

          <p>{!! $productt->description !!} </p>


          <dl class="row">
            

            <dt class="col-sm-3">Delivery</dt>
            <dd class="col-sm-9">Mzumbe Main Campus, Changarawe, Ostabay </dd>
          </dl>

          <hr>
         

          {{-- <a href="" class="btn  btn-primary"> Buy now </a> --}}
          <a href="/add_to_cart/{{$productt->id}}"class="btn  btn-outline-primary"> <span class="text">Add to cart</span> <i class="fa fa-shopping-cart"></i>  </a>
        </article> <!-- product-info-aside .// -->
      </main> <!-- col.// -->
    </div> <!-- row.// -->
  </div> <!-- card.// -->


