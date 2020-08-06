<div class="row">
    <div class="col-lg-12">
        <input type="file" name="product_images[]" id="product_images" multiple>
        <label class="custom-file-label" for="product_images">Choose Images</label>
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-lg-6">
        <input type="file" name="product_featured_img" id="product_featured_img" multiple>
        <label class="custom-file-label" for="product_featured_img">Choose Featured Image</label>
    </div>
    <div class="col-lg-6">
        <input type="file" name="product_flash_deal_img" id="product_flash_deal_img" multiple>
        <label class="custom-file-label" for="product_flash_deal_img">Choose Flash Deal Image</label>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <label for="product_video">Product Youtube Video</label>
        <input type="text" name="form-control" id="product_video" class="product_video form-control"
            value="{{$product->product_video ?? old('product_video')}}" placeholder="Product Youtube Video">
    </div>
</div>