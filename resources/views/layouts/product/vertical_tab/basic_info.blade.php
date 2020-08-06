<div class="row">
    <input type="hidden" value="{{\Auth::check() ? \Auth::user()->id : ''}}">
    <div class="col-lg-12">
        <label for="product_name">Product Name<span class="text-danger">*</span></label>
        <input type="text" name="product_name" id="product_name" class="form-control"
            value="{{$product->product_name ?? old('product_name')}}" placeholder="Product Name">
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-4">
        <label for="product_category_id">Category<span class="text-danger">*</span></label>
        <select class="form-control select2" style="width: 100%;" name="product_category_id" id="product_category_id">
            @foreach ($product_categories as $parent_category)
            <option value="{{$parent_category->id}}"
                {{isset($product) ? $parent_category->id == $product->product_category_id ? 'selected' : '' : ''}}>
                {{$parent_category->category_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-4">
        <label for="product_sub_category_id">Sub Category<span class="text-danger">*</span></label>
        <select class="form-control select2" style="width: 100%;" name="product_sub_category_id"
            id="product_sub_category_id">
            @foreach ($product_sub_categories as $sub_category)
            <option value="{{$sub_category->id}}"
                {{isset($product) ? $sub_category->id == $product->product_sub_category_id ? 'selected' : '' : ''}}>
                {{$sub_category->sub_category_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-4">
        <label for="brand_id">Brand<span class="text-danger">*</span></label>
        <select class="form-control select2" style="width: 100%;" name="brand_id" id="brand_id">
            @foreach ($product_brands as $brand)
            <option value="{{$brand->id}}"
                {{isset($product) ? $brand->id == $product->brand_id ? 'selected' : '' : ''}}>
                {{$brand->brand_name}}</option>
            @endforeach
        </select>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <label for="product_excerpt">Product Excerpt<span class="text-danger">*</span></label>
        <textarea name="product_excerpt" id="product_excerpt" class="textarea"></textarea>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <label for="product_description">Product Description</label>
        <textarea name="product_description" id="product_description" class="textarea"></textarea>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <label for="product_featured">Featured ?<span class="text-danger">*</span></label>
        <input type="hidden" name="product_featured" value="0">
        <input type="checkbox" id="product_featured" name="product_featured"
            {{!empty($product) ? $product->product_featured ? 'checked' : '' : ''}} data-bootstrap-switch
            data-off-color="danger" data-on-color="success" value="1">
    </div>
    <div class="col-lg-6">
        <label for="product_published">Published ?<span class="text-danger">*</span></label>
        <input type="hidden" name="product_published" value="0">
        <input type="checkbox" id="product_published" name="product_published"
            {{!empty($product) ? $product->product_published ? 'checked' : '' : ''}} data-bootstrap-switch
            data-off-color="danger" data-on-color="success" value="1">
    </div>
</div>