<div class="row">
    <div class="col-lg-6">
        <label for="category_name">Product Category Name <span class="text-danger">*</span></label>
        <input type="text" name="category_name" id="category_name" class="form-control"
            value="{{ $category->category_name ?? old('category_name') }}" placeholder="Product Category Name" required>
    </div>
    <div class="col-lg-6">
        <label for="category_slug">Product Category Slug <span class="text-danger">*</span></label>
        <input type="text" name="category_slug" id="category_slug" class="form-control"
            value="{{ $category->category_slug ?? old('category_slug') }}" placeholder="Product Category Slug" required>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-6">
        <label for="category_icon">Product Category Icon</label>
        <input type="text" name="category_icon" id="category_icon" class="form-control"
            value="{{ $category->category_icon ?? old('category_icon') }}" placeholder="Product Category Icon">
    </div>
    <div class="col-lg-4">
        <label for="category_image">Product Category Image</label>
        <input type="file" name="category_image" id="category_image">
    </div>
    <div class="col-lg-2">
        <label for="category_featured">Featured ? </label>
        <input type="hidden" name="category_featured" value="0">
        <input type="checkbox" id="category_featured" name="category_featured"
            {{!empty($category) ? $category->category_featured ? 'checked' : '' : ''}} data-bootstrap-switch
            data-off-color="danger" data-on-color="success" value="1">
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <textarea name="category_description" id="category_description" class="textarea" cols="30"
            rows="10">{{$category->category_description ?? ''}}</textarea>
    </div>
</div>
<input type="submit" class="btn btn-primary btn-block" value="Submit">