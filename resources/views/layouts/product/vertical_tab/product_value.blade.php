<div class="row">
    <div class="col-lg-4">
        <label for="product_cost_price">Cost Price<span class="text-danger">*</span></label>
        <input type="number" name="product_cost_price" id="product_cost_price" class="form-control"
            value="{{$product->product_cost_price ?? old('product_cost_price')}}" placeholder="Cost Price">
    </div>
    <div class="col-lg-4">
        <label for="product_unit_price">Unit Price<span class="text-danger">*</span></label>
        <input type="number" name="product_unit_price" id="product_unit_price" class="form-control"
            value="{{$product->product_unit_price ?? old('product_unit_price')}}" placeholder="Unit Price">
    </div>
    <div class="col-lg-4">
        <label for="product_stock">Product Stock<span class="text-danger">*</span></label>
        <input type="number" name="product_stock" id="product_stock" class="form-control"
            value="{{$product->product_stock ?? old('product_stock')}}" placeholder="Product Stock">
    </div>
</div>