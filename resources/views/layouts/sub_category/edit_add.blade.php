<div class="row">
    <div class="col-lg-4">
        <label for="product_category_id">Parent Category <span class="text-primary"><a
                    href="{{url(config('setting.prefix', 'admin/shop') . '/category/create')}}">Create Product
                    Category</a></span><span class="text-danger">*</span></label>
        <select class="form-control select2" style="width: 100%;" name="product_category_id">
            @foreach ($product_categories as $parent_category)
            <option value="{{$parent_category->id}}"
                {{isset($subcategory) ? $parent_category->id == $subcategory->product_category_id ? 'selected' : '' : ''}}>
                {{$parent_category->category_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-4">
        <label for="sub_category_name">Sub Category Name<span class="text-danger">*</span></label>
        <input type="text" name="sub_category_name" id="sub_category_name" class="form-control"
            value="{{$subcategory->sub_category_name ?? old('sub_category_name')}}" placeholder="Sub Category Name">
    </div>
    <div class="col-lg-4">
        <label for="sub_category_slug">Sub Category Slug</label>
        <input type="text" name="sub_category_slug" id="sub_category_slug" class="form-control"
            value="{{$subcategory->sub_category_slug ?? old('sub_category_slug')}}" placeholder="Sub Category Slug">
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-3">
        <input type="text" name="sub_category_icon" id="sub_category_icon" class="form-control"
            value="{{$subcategory->sub_category_icon ?? old('sub_category_icon')}}" placeholder="Sub Category Icon">
    </div>
    <div class="col-lg-3">
        <label>Sub Category Image</label>
        <input type="file" class="custom-file-input" name="sub_category_image" id="sub_category_image">
        <label class="custom-file-label" for="sub_category_image">Choose file</label>
    </div>
    <div class="col-lg-3">
        <label for="sub_category_featured">Featured ?<span class="text-danger">*</span></label>
        <input type="hidden" name="sub_category_featured" value="0">
        <input type="checkbox" id="sub_category_featured" name="sub_category_featured"
            {{!empty($subcategory) ? $subcategory->sub_category_featured ? 'checked' : '' : ''}} data-bootstrap-switch
            data-off-color="danger" data-on-color="success" value="1">
    </div>
    <div class="col-lg-3">
        <label for="sub_category_status">Status ?<span class="text-danger">*</span></label>
        <input type="hidden" name="sub_category_status" value="0">
        <input type="checkbox" id="sub_category_status" name="sub_category_status"
            {{!empty($subcategory) ? $subcategory->sub_category_status ? 'checked' : '' : ''}} data-bootstrap-switch
            data-off-color="danger" data-on-color="success" value="1">
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <label for="sub_category_description">Sub Category Description</label>
        <textarea name="sub_category_description" id="sub_category_description" class="textarea" cols="30"
            rows="10">{{$productCategory->sub_category_description ?? ''}}</textarea>
    </div>
</div>
<input type="submit" value="Submit" class="btn btn-primary btn-block">