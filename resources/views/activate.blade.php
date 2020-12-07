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
  