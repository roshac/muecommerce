@extends('layouts.app')
@section('content')
<div class="content" style="background: rgb(255, 255, 255)">
  @include('adminlte-templates::common.errors')
  <h3><b>SELLER ACCOUNT</b></h3>
  <strong><hr></strong> 
  <div class="row">
    <div class="col-md-4">
      <h4 style="text-align: center"><b>User Profile</b></h4>
      <table>
        <tr>
          <td>
            <img src="{{ URL::asset('storage/' . Auth::User()->photo) }}" width="267px" height="242x" style="margin-left: 10%"/>
          </td>
        </tr>
        <tr style="text-align: center">
          <td>
            <h5><b>{{Auth::User()->name}}</b></h5>
          </td>
        </tr>
        <tr>
          <td style="text-align: center">
            <strong>{{Auth::User()->email}}</strong>
          </td>
        </tr>
        
      </table><br><br>
      <div class="col md-4">
        <div class="alert alert-success" role="alert">
          <h4 class="alert-heading">Something to Note</h4>
          <li>Fill All Fields</li>
          <li>For Payement</li>
          <li>You Must Have MASTERCARD or VISA</li>
          <li>Read Carefully Terms and Condition</li>
          <hr>
          <p class="mb-0">NOTE!! Account will Expire As soon as the Package is Over .</p>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Open New Company</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="status-tab" data-toggle="tab" href="#status" role="tab" aria-controls="status" aria-selected="false">Account Status</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Terms and Condition</a>
        </li>
      </ul>
      <form role="form" action="{{ route('agreement.post') }}" method="post" class="require-validation" data-cc-on-file="false"
      data-stripe-publishable-key="pk_test_51GujqrBJVKJhJqjqbsgRa2wdHGHghvPC6ILwO4HQVZekmNKWYCoEvbsrJmJB7Ce3HUaInQorNlfQvh58K1bMg7ae00SdEchk98"
      id="payment-form">
      @csrf
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Company Name</label>
              <input type="text" class="form-control" placeholder="Benga Popcorn" id="inputEmail4" name="name" required>
            </div>
            <div class="form-group col-md-6">
              <label for="categories">Catecory</label>
              <select id="categories" name="categories" class="form-control">
                <option value="">Select Categoty</option>
                @foreach($categories as $categories)
                <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-6" >
              <label for="inputEmail4">Phone No</label>
              <input type="phone" class="form-control" placeholder="0765 814169" id="inputPhone" name="phone_no" required>
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Payment Id</label>
              <input type="text" class="form-control" name="pay_id" id="inputPassword4" required>
            </div>
            
          </div>
          <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address">
          </div>
          
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCity">Region</label>
              <input type="text" class="form-control" id="inputCity" name="region">
            </div>
            <div class="form-group col-md-6">
              <label for="inputState">Company Location</label>
              <input type="text" placeholder="Uswazi chini" id="inputState" class="form-control" name="location">
            </div>
            
            <div class="row">
              <div class="col-md-8">
                <div class="row">
                  <div class="card" style="margin-left: 4%;width: 100%">
                    <div class="card-header" style="text-align: center"><b>CHOOSE PACKAGE</b></div>
                    @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                      <p>{{ Session::get('success') }}</p>
                    </div>
                    @endif
                    <div class="row" style="padding: 1%">
                      <div class="form-group col-md-4 required">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch1" value="5000" name="price">
                          <label class="custom-control-label" for="customSwitch1">1 Month <span><b>5000Tsh</b></span></label>
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch2" value="60000" name="price" >
                          <label class="custom-control-label" for="customSwitch2">6 Month <span><b>60000Tsh</b></span></label>
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch3" value="120000" name="price" >
                          <label class="custom-control-label" for="customSwitch3">1 Year<span><b> 120000Tsh</b></span></label>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group col-md-6 required" style="margin-top: 2%">
                    <label class='control-label'>Name on Card</label> <input
                    class='form-control' size='4' type='text'>
                  </div>
                  
                  <div class="form-group col-md-6 card required" style="margin-top: 2%">
                    <label class='control-label'>Card Number</label> <input
                    autocomplete='off' class='form-control card-number' size='20'
                    type='text'>
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
                  <div class='form-row row'>
                    <div class='col-md-12 error form-group hide'>
                      <div class='alert-danger alert'>Please correct the errors and try
                        again.</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <h4 style="text-align: center"><b>PAYEMENT TYPES</b></h4>
                  <div class="form-group col md-8">
                    <img src="{{ URL::asset('storage/masta.png') }}" height="30">
                    
                  </div>
                  {{-- <div class="form-group col md-8">
                    <img src="{{ URL::asset('storage/pesa.png') }}" height="50">
                    
                  </div> --}}
                  
                  
                  <button class="btn btn-md btn-success" style="margin-left: 25%"><i class="fa fa-send"> Pay & Submit</i></button>
                </div>
              </form>
              </div>
              
            </div>
          </div>
         
            <div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="status-tab">
              <div class="row">
                <div class="col-md-10">
                  <table class="table">
                    <tr><th colspan="6" style="text-align: center">COMPANY DETAILS</th></tr>
                    <tr><th>Co ID</th><th>Co Name</th><th>Type</th><th>Location</th><th>Package Type</th><th>Expire Date</th></tr>
                    @foreach ($cstatus as $co)
                    <tr><td>{{$co->id}}</td><td><small>{{$co->name}}</small></td><td>Food</td><td>{{$co->location}}</td><td>{{$co->package_type}}</td><td><small>{{$co->end_date}}</small></td></tr> 
                  </table>
                  @if ($co->status != '0')
                  <div class="card" style="width: 40%;margin-left: 30%">
                    <div class="card-header" style="text-align: center"><strong>Days Remain To Expire</strong></div>
                    <div style="padding: 4%">
                  <h1 style="text-align: center">{{$days}}</h1>
                    </div>
                  </div>
                  @endif
                  @if ($co->status == '0')
                  <div class="card">
                    <form  action="{{URL::asset('coActivate/'.$co->id.'?_method=PUT')}}"  method="POST" enctype="multipart/form-data" >
                      @csrf
                      <div class="card-header"><strong>Buy Package To Activate</strong></div>
                      <div class="row" style="padding: 2%">
                          <div class="form-group col-md-4 required">
                              <div class="custom-control custom-switch">
                                  <input type="checkbox" class="custom-control-input" id="customSwitch5" value="5000" name="price2" >
                                  <label class="custom-control-label" for="customSwitch5">1 Month <span><b>5000Tsh</b></span></label>
                              </div>
                          </div>
                          <div class="form-group col-md-4">
                              <div class="custom-control custom-switch">
                                  <input type="checkbox" class="custom-control-input" id="customSwitch6" value="60000" name="price2" >
                                  <label class="custom-control-label" for="customSwitch6">6 Month <span><b>60000Tsh</b></span></label>
                              </div>
                          </div>
                          <div class="form-group col-md-4">
                              <div class="custom-control custom-switch">
                                  <input type="checkbox" class="custom-control-input" id="customSwitch7" value="120000" name="price2" >
                                  <label class="custom-control-label" for="customSwitch7">1 Year<span><b> 120000Tsh</b></span></label>
                              </div>
                          </div>
                      </div>
                      <div class="row" style="padding: 3%">
                          
                          <div class="form-group col-md-6 required" style="margin-top: 2%">
                              <label class='control-label'>Name on Card</label> <input
                              class='form-control' size='4' type='text'>
                          </div>
                          
                          <div class="form-group col-md-6 card required" style="margin-top: 2%">
                              <label class='control-label'>Card Number</label> <input
                              autocomplete='off' class='form-control card-number' size='20'
                              type='text'>
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
                          <div class='form-row row'>
                              <div class='col-md-12 error form-group hide'>
                                  <div class='alert-danger alert'>Please correct the errors and try
                                      again.</div>
                                  </div>
                              </div>
                              <div class="form-row">
                                  
                              </div>
                          </div>
                          <input type="submit" value="Activate" class="btn btn-success float-right" style="margin-left: 80%">
                      </form>
                    
                    </div>
                    @endif
                  </div>
                  <div class="col-md-1">
                    @if ($co->status == '0')
                    <h5 style=""><strong>INACTIVE</strong></h5><br>
                    <i class="fa fa-times-circle" style="color: red; font-size: 820%; margin-left: "></i>
                    
                    @else
                    <h4 style="">ACTIVATED</h4><br>
                    <i class="fa fa-check-circle" style="color: green; font-size: 820%; margin-left: "></i>
                    @endif
                    
                  </div>
                </div>
                @endforeach
              </div>
              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                NO RETURN
              </div>
            </div>
            
          </div>
          
        </div>
      </div>
     
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    
      <script type="text/javascript">
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
      @endsection
      
      
      
      
      
