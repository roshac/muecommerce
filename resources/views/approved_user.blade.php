
@extends('layouts.app')

@section('content')
<section class="content-header">
  <h1>
    
    <strong>Approved Bids</strong>  
    
  </h1>
</section>
<div class="content">
  @include('adminlte-templates::common.errors')
  
  <table class="table table-striped" style="width: 100%">
    <thead>
    <tr><th>S/NO</th><th>Bidder</th><th>Product</th><th>Start Price</th><th>Bid Ammount</th><th>Date</th><th>Action</th></tr>
  </thead><tbody>
    @foreach ($my_bid  as $key => $produc)
    <tr>
      <td>{{++$key}}</td>
      <td>{{$produc->user->name}}</td>
    <td>{{$produc->auction->name}}</td>
      <td>{{$produc->auction->starting_price}}</td>
      <td><span>Tsh</span> <strong>{{$produc->fee_paid}} </strong></td>
      <td>{{$produc->created_at}} </td>
      
      <td>
      
        
        {{-- <a href="{{URL::asset('bidPay/'. $produc->id.'/'.$produc->auction->id.'/'.$produc->fee_paid)}}" class='btn btn-success btn-xs'><i class="fa fa-check" style=""></i>Pay</a> --}}
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal{{$produc->id}}">
          <i class="fa fa-check" style=""></i> Pay
        </button>
       
      </td>
    </tr>
    @endforeach
  </table>
    <div class="modal fade" id="exampleModal{{$produc->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pay Bid</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form role="form" action="bidPay/{{$produc->auction->id}}/{{$produc->fee_paid}}" method="post" class="require-validation" data-cc-on-file="false"
            data-stripe-publishable-key="pk_test_51GujqrBJVKJhJqjqbsgRa2wdHGHghvPC6ILwO4HQVZekmNKWYCoEvbsrJmJB7Ce3HUaInQorNlfQvh58K1bMg7ae00SdEchk98"
            id="payment-form">
            @csrf
            @foreach ($produc->user->contact as $add)
              <div class="col-md-12">
							<h6><b>Location: </b><span>{{ $add->location }}</span><b> Phone No: </b><span>{{ $add->phone_no }}</span> <span><div class="custom-control custom-switch">
								<input type="checkbox" class="custom-control-input" id="customSwitch1{{$add->id}}" value="{{ $add->id}}" name="phone">
									<label class="custom-control-label" for="customSwitch1{{$add->id}}">Choose</label>
								</div></span></h6>
            </div>
          </tbody>
                @endforeach
            <div class="card" style="width: auto">
              
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-4 required" style="margin-top: 2%">
                    <label class='control-label'>Name on Card</label> <input
                    class='form-control' size='4' type='text' required>
                  </div>
                  
                  <div class="form-group col-md-8 card required" style="margin-top: 2%">
                    <label class='control-label'>Card Number</label> <input
                    autocomplete='off' class='form-control card-number' size='20'
                    type='text' required>
                  </div>
                  
                  <div class="form-group col-md-4 cvc required">
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
                  
                </div>
              </div> <!-- card-body.// -->
            </div> <!-- card.// -->
            
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Pay</button>
          </form>
        </div>
        
      </div>
      </div>
    </div>
</div>
<script type="application/javascript" src="https://js.stripe.com/v2/"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script type="application/javascript">
  $(function() {
    var $form         = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
      var $form         = $(".require-validation"),
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
</script>
{{-- <script type="application/javascript">
  $(document).ready(function() {
      $('#example').DataTable();
  } );
</script>
{{-- <script src="{{asset('js\app.js')}}" defer></script> --}}
{{-- <script type="application/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="application/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css"> --}}

@endsection
