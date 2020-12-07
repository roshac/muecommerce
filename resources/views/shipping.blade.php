@include('wel')
<br>
<article class="card" style="width: 96%;margin-left: 2%;">
	<header class="card-header"><strong>My Shipping Address</strong>  </header>
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<header class="card-header">Add New Address</header>
					<div class="card-bordy">
						<form action="addaddress" method="POST" style="padding: 1%">
							<div class="form-row">
								@csrf
								<div class="form-group col-md-6">
									<label for="area">Destination Area</label>
									<input class="form-control" type="tect" name="area" placeholder="Mirambo 308 or Nyirenda NY-34">
								</div>
								<div class="form-group col-md-6">
									<label for="phone">Phone Number</label>
									<input class="form-control" type="phone" name="phone" placeholder="Enter Phone Number">
								</div>
								<div class="form-group col-md-6">
									<label for="regi">Region</label>
									<select id="regi" name="regi" class="form-control">
										<option value="">Select Region</option>
										@foreach($regi as $regi)
									<option value="{{ $regi->id }}">{{ $regi->name }} Shipping = {{$regi->ship_price}}</option>
										@endforeach
									</select>
								</div>
								
								<div class="form-group col-6">
									
								</div>
								<input type="submit" value="Save Address" class="btn btn-primary">
								@include('flash::message')
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card card-header-pills">
					<header class="card-header">Choose Address</header>
					{{-- <div class="card-body" style="padding: 7%; color: red">
						<h4><b>!!! YOU DONT HAVE ADDRESS TO CHOOSE !!!</b></h4>
						{{ $address }}
					</div> --}}
					<div class="row" style="padding: 5px">
						@foreach ($address as $add)
						<div class="col-md-3">
							<h6><b>Location: </b><span>{{ $add->location }}</span></h6>
						</div>
						<div class="col-md-3">
							<h6><b>Phone No: </b><span>{{ $add->phone_no }}</span></h6>
						</div>
						<div class="col-md-3">
							<form role="form" action="shipping2" method="post" 
							{{-- class="require-validation"  --}}
							{{-- data-cc-on-file="false" --}}
							{{-- data-stripe-publishable-key="pk_test_51GujqrBJVKJhJqjqbsgRa2wdHGHghvPC6ILwO4HQVZekmNKWYCoEvbsrJmJB7Ce3HUaInQorNlfQvh58K1bMg7ae00SdEchk98" --}}
							{{-- id="payment-form" --}}
							>
								@csrf
								<div class="custom-control custom-switch">
								<input type="checkbox" class="custom-control-input" id="customSwitch1{{$add->id}}" value="{{ $add->id}}" name="area">
									<label class="custom-control-label" for="customSwitch1{{$add->id}}">Choose</label>
								</div>
								
							</div>
							<div class="col-md-3">
								
								<button class="btn btn-outline-danger"> <span><i class="fas fa-trash"></i></span> Delete</button>
								
							</div>
							<hr>
							@endforeach
					        </div>
							<hr>
							{{-- <div class="row" style="padding: 5px">
							<h6 class="col-md-5">Choose Payment Option</h6><span style="color: seagreen"><p>NOTE!! Casho on Delivery is for Morogoro Only</p></span></div>
							<div class="row" style="padding: 5px">
							<div class="custom-control custom-switch col-4 ml-3">
								<input type="checkbox" class="custom-control-input" id="customSwitch1" value="COD" name="area1">
									<label class="custom-control-label" for="customSwitch1">Cash on Delivery</label>
								</div>

								<div class="custom-control custom-switch col-4">
									<input type="checkbox" class="custom-control-input" id="customSwitch2" value="CARD" name="area1">
										<label class="custom-control-label" for="customSwitch2">Card</label>
								</div>

								</div>
								@if(session()->has('Error'))
								<div class="alert alert-danger" style="margin-left: 30%; width: 40%">{{session()->get('Error')}}</div>
								@endif --}}
						</div>
						
					</div>
				</div>
				
			</div> <!-- row .//  -->
			<br>
			<div class="row" style="margin-left: ">
				<aside class="col-md-8">
					<output>
						<div class="card">
							<header class="card-header"><b>SHOPPING CART</b></header>
							<div class="card-body">
								<div class="table-responsive">
									
									<table class="table table-borderless table-shopping-cart">
										<thead class="text-muted">
											<tr class="small text-uppercase">
												<th scope="col">Product</th>
												<th scope="col" width="90">Quantity</th>
												<th scope="col" width="120">Price</th>
												<th scope="col" width="210">Description</th>
												<th scope="col" class="text-right d-none d-md-block" width="15"> </th>
											</tr>
										</thead>
										<tbody>
											<tr>
												@foreach ($product as $products)
												<td>
													<figure class="itemside align-items-center">
														<div class="aside"><img src="{{ URL::asset('storage/' . $products['item']['photo']) }}"   class="img-sm"/></div>
														<figcaption class="info">
															<a href="/imagedetail" class="title text-dark">{{$products['item']['name']}}</a>
															<p class="text-muted small">Type: {{$products['item']['category']['name']}}<br> Seller: </p>
														</figcaption>
													</figure>
												</td>
												<td>
													<input type="number" class="form-control" value="{{$products['qty']}}" name="number" id="cart1">
												</td>
												<td>
													<div class="price-wrap">
														<var class="price">Tsh{{$products['item']['price']}}</var>
														<small class="text-muted"> Tsh{{$products['price']}}</small>
													</div> <!-- price-wrap .// -->
												</td>
												<td>
													<textarea class="form-control" placeholder="Put Your Details here" name="desc" id="" cols="8" rows="3"></textarea>
												</td>
												<td class="text-right d-none d-md-block">
													<a data-original-title="Save to Wishlist" title="" href="wishlist/{{$products['item']['id']}}" class="btn btn-light" data-toggle="tooltip"> <i class="fa fa-heart"></i></a>
													<a href="shopping_cart/{{$products['item']['id']}}" class="btn btn-outline-danger"> Remove</a>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
									
								</div> <!-- table-responsive.// -->
								
								<div class="card-body border-top">
									<p class="icontext"><i class="icon text-success fa fa-truck"></i> Free Delivery within 1-2 days</p>
									{{-- <span><input type="submit" value="Save Order" class="btn btn-primary" style="float:right"></span> --}}
								
							</div> <!-- card-body.// -->
						</div>
						
					</div> <!-- card.// -->
				</output>
			</aside>
			<aside class="col-lg-3">
				
				<div class="card mb-3" style="width: 130%">
					<div class="card-body">
						<strong style="text-align: center">CHECK OUT</strong>
						<hr>
						<dl class="dlist-align">
							<dt>Total price: </dt>
							<dd class="text-right">Tsh {{$totalPrice}}</dd>
						</dl>
						<dl class="dlist-align">
							<dt>Discount:</dt>
							<dd class="text-right text-danger">- 0.00</dd>
						</dl>
						<dl class="dlist-align">
							<dt>Total: </dt>
							<dd class="text-right">Tsh {{$totalPrice}}</dd>
						</dl>
						
					</div> <!-- card-body.// -->
				</div> <!-- card.// -->
				
				<div class="card" style="width: 130%">
					<div class="card-body">
						<div class="row">
							<h5 class="col-md-12" style="text-align: center">Pay Through This Number</h5>
							<h4 class="col-md-12" style="color: red;font-weight:bold;text-align: center">0765 824 169</h4>
							<h5 class="col-md-12" style="text-align: center;font-weight:bold">MU-ECOMMERCE</h5>
						</div>
						<hr>
						
						<div class="row" style="align-content: center">
							{{-- <div class="form-group col-md-4 required" style="margin-top: 2%">
								<label class='control-label'>Name on Card</label> <input
								class='form-control' size='4' type='text'>
							</div> --}}

							
							<div class="form-group col-md-12" style="margin-top: 2%">
								<label class='control-label'>Pone Number Used To Pay</label> <input
								 class='form-control card-number' 
								 name="pay_phone"
								 {{-- size='20' --}}
								type='text' required>
							</div>

							<div class="col-md-12">
								<h6 style="font-weight: bold;color: red">YOU CAN PAY CASH ON DELIVERY</h6>

							</div>
							
							{{-- <div class="form-group col-md-4 cvc required">
								<label class='control-label'>CVC</label> <input autocomplete='off'
								class='form-control card-cvc' placeholder='ex. 311' size='4'
								type='text'>
							</div>
							<div class="form-group col-md-4 expiration required">
								<label class='control-label'>Expiration Month</label> <input
								class='form-control card-expiry-month' placeholder='MM' size='2'
								type='text'>
							</div>
							<div class="form-group col-md-4 expiration required">
								<label class='control-label'>Expiration Year</label> <input
								class='form-control card-expiry-year' placeholder='YYYY' size='4'
								type='text'>
							</div>
							
							</div> --}}
							<hr>
							{{-- <p class="text-center mb-3">
								<img src="{{ URL::asset('storage/masta.png') }}" height="50">
								<img src="{{ URL::asset('storage/masta.png') }}" height="50">
								<img src="{{ URL::asset('storage/logo.jpg') }}" height="50">
							</p> --}}
							<input type="submit" class="btn btn-primary btn-block"value="Make Purchase">
							<a href="/" class="btn btn-light btn-block">Continue Shopping</a>
						</form>
						</div> <!-- card-body.// -->
					</div> <!-- card.// -->
				</aside> <!-- col.// -->
			</div>
		</div>
	</article>
	<br>
	@include('footer')
	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
	{{-- <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	
	<script type="text/javascript">
		$(function() {
			var $form  = $(".require-validation");
			$('form.require-validation').bind('submit', function(e) {
				var $form = $(".require-validation"),
				inputSelector = ['input[type=email]', 'input[type=password]',
				'input[type=text]', 'input[type=file]',
				'textarea'].join(', '),
				$inputs       = $form.find('.required').find(inputSelector),
				$errorMessage = $form.find('div.error'),
				valid         = true;
				$errorMessage.addClass('hide');
				
				$('.has-error').removeClass('has-error');
				$inputs.each(function(i, el) {
					var $input = $(el);
					if ($input.val() === '') {
						$input.parent().addClass('has-error');
						$errorMessage.removeClass('hide');
						e.preventDefault();
					}
				});
				
				if (!$form.data('cc-on-file')) {
					e.preventDefault();
					Stripe.setPublishableKey($form.data('stripe-publishable-key'));
					Stripe.createToken({
						number: $('.card-number').val(),
						cvc: $('.card-cvc').val(),
						exp_month: $('.card-expiry-month').val(),
						exp_year: $('.card-expiry-year').val()
					}, stripeResponseHandler);
				}
				
			});
			function stripeResponseHandler(status, response) {
				if (response.error) {
					$('.error')
					.removeClass('hide')
					.find('.alert')
					.text(response.error.message);
				} else {
					// token contains id, last4, and card type
					var token = response['id'];
					// insert the token into the form so it gets submitted to the server
					$form.find('input[type=text]').empty();
					$form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
					$form.get(0).submit();
				}
			}
			
		});
	</script> --}}
	
