<div class="row">
    <div class="col-lg-12">
        <label for="product_meta_name">Product SEO Name</label>
        <input type="text" name="product_meta_name" class="form-control" id="product_meta_name"
            value="{{$product->product_meta_name ?? old('product_meta_name')}}" placeholder="Product SEO Name">
    </div>
    <br>
    <div class="col-lg-12">
        <label for="product_meta_description">Product SEO Description</label>
        <textarea name="product_meta_description" id="product_meta_description" class="textarea"></textarea>
    </div>
</div>