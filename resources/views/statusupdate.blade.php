<div class="form-group">
    <div class="row">
    <input type="hidden" name="" _method="PUT">
        <label for="status" class="col-md-6">Change Order Status</label>
    </div>
        <div class="row" >
        <select id="status" name="status" class="form-control col-md-6">
            <option value="">Select Status</option> 
             @foreach($status as $status) 
                <option value="{{ $status->id }}">{{ $status->name }}</option>
            @endforeach 
        </select>
       
        <input type="submit" name="Change Status" class="btn btn-primary " style="margin-left: 4%">
    </div>
    
    </div>

{{-- <a href="{{ $order_product->id }}"  class="btn btn-primary">Change Status</a> --}}