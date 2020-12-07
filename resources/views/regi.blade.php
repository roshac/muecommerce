<div class="form-group col-md-6">
    <label for="reg">Region</label>
    <select id="reg" name="reg" class="form-control">
        <option value="">Select Region</option>
        @foreach($reg as $reg)
        <option value="{{ $reg->id }}">{{ $reg->name }}</option>
    
    </select>
</div>
 <div class="form-group col-6">
    <label for="phone">Shipping Price</label>
 <input class="form-control" type="phone" value="{{$reg->ship_price}}" disabled>
 </div>
 @endforeach