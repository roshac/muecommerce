@include('wel')
<br>
<article class="card" style="margin-left: 0.8%;margin-right: 0.8%">
    <header class="card-header"><strong>My wishlist</strong>  </header>
    <div class="card-body">
        <div class="row">
            @foreach ($product as $products)
             <div class="col-md-4">
                <figure class="itemside mb-4">
                    <div class="aside"><img src="{{ URL::asset('storage/' . $products['item']['photo']) }}" class="border img-md"></div>
                    <figcaption class="info">
                    <a href="#" class="title">{{$products['item']['name'] }}</a>
                    <p class="price mb-2">Tsh{{ $products['item']['price'] }}</p>
                        <a href="#" class="btn btn-primary btn-sm"> Add to cart </a>
                        <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" title="" data-original-title="Remove from wishlist"> <i class="fa fa-times"></i> </a>
                    </figcaption>
                </figure>
            </div> <!-- col.// -->
            @endforeach
        </div> <!-- row .//  -->

    </div> <!-- card-body.// -->
</article>
<br>
@extends('footer')