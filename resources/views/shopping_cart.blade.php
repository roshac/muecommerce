@include('wel')
<hr class="divider">
<h3 class="doc-title-sm" style="margin-left: 7%"><strong><b><h5>Shopping cart</h5></b></strong> </h3>


<div class="row" style="width: 95%">
  <aside class="col-lg-9">
    <div class="card" style="margin-left: 7%">

      <div class="table-responsive">

        <table class="table table-borderless table-shopping-cart">
          <thead class="text-muted">
            <tr class="small text-uppercase">
              <th scope="col">Product</th>
              <th scope="col" width="120">Quantity</th>
              <th scope="col" width="220">Price</th>
              <th scope="col" class="text-right d-none d-md-block" width="15"> </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              @foreach ($carts as $carts)
              <td>
                <figure class="itemside align-items-center">
                  <div class="aside"><img src="{{ URL::asset('storage/' . $carts->photo) }}"   class="img-sm"/></div>
                  <figcaption class="info">
                    <a href="/imagedetail" class="title text-dark">{{$carts->name}}</a>
                    <p class="text-muted small">Type: {{$carts->category}} <br> Seller: </p>
                  </figcaption>
                </figure>
              </td>
              <td>
                <select class="form-control">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                </select>
              </td>
              <td>
                <div class="price-wrap">
                  <var class="price">Tsh{{$carts->price}}</var>
                  <small class="text-muted"> Tsh{{$carts->price}} each </small>
                </div> <!-- price-wrap .// -->
              </td>
              <td class="text-right d-none d-md-block">
                <a data-original-title="Save to Wishlist" title="" href="#" class="btn btn-light" data-toggle="tooltip"> <i class="fa fa-heart"></i></a>
              <a href="shopping_cart/{{$carts->id}}" class="btn btn-outline-danger"> Remove</a>
              </td>
            </tr>

            @endforeach
          </tbody>
        </table>

      </div> <!-- table-responsive.// -->

      <div class="card-body border-top">
        <p class="icontext"><i class="icon text-success fa fa-truck"></i> Free Delivery within 1-2 days</p>
      </div> <!-- card-body.// -->

    </div> <!-- card.// -->

  </aside> <!-- col.// -->
  <aside class="col-lg-3">

    <div class="card mb-3">
      <div class="card-body">
        <form>
          <div class="form-group">
            <label>Have coupon?</label>
            <div class="input-group">
              <input type="text" class="form-control" name="" placeholder="Coupon code">
              <span class="input-group-append">
                <button class="btn btn-primary">Apply</button>
              </span>
            </div>
          </div>
        </form>
      </div> <!-- card-body.// -->
    </div> <!-- card.// -->

    <div class="card">
      <div class="card-body">
        <dl class="dlist-align">
          <dt>Total price:</dt>
          <dd class="text-right">Tsh{{$price}} </dd>
        </dl>
        <dl class="dlist-align">
          <dt>Discount:</dt>
          <dd class="text-right text-danger">- 0.00</dd>
        </dl>
        <dl class="dlist-align">
          <dt>Total:</dt>
          <dd class="text-right text-dark b"><strong>Tsh{{$price}} </strong></dd>
        </dl>
        <hr>
        <p class="text-center mb-3">
          <img src="{{ URL::asset('storage/cod.jpg') }}" height="60">
        </p>
        <a href="shipping" class="btn btn-primary btn-block"> Make Purchase </a>
        <a href="/" class="btn btn-light btn-block">Continue Shopping</a>
      </div> <!-- card-body.// -->
    </div> <!-- card.// -->
  </aside> <!-- col.// -->
</div> <!-- row.// -->
</div>
