<div class="row">
    <div class="col-lg-6">
        <label for="brand_name">Brand Name</label>
        <input type="text" name="brand_name" id="brand_name" class="form-control"
            value="{{$brand->brand_name ?? old('brand_name')}}" placeholder="Brand Name">
    </div>
    <div class="col-lg-6">
        <label for="brand_slug">Brand Slug</label>
        <input type="text" name="brand_name" id="brand_slug" class="form-control"
            value="{{$brand->brand_slug ?? old('brand_slug')}}" placeholder="Brand Slug">
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <label>Brand Image</label>
        <input type="file" class="custom-file-input" name="brand_image" id="brand_image">
        <label class="custom-file-label" for="brand_image">Choose Image</label>
    </div>
</div>
<br>
<div class="row">
    <textarea name="brand_description" id="brand_description" class="textarea" cols="30" rows="10">
        {{$brand->brand_description ?? old('brand_description')}}
    </textarea>
</div>