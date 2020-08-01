<div class="row">
    <div class="col-lg-4">
        <label for="product_attribute_code">Product Attribute Code<span class="text-danger">*</span></label>
        <input type="text" name="product_attribute_code" id="product_attribute_code" class="form-control"
            value="{{$attribute->product_attribute_code ?? old('product_attribute_code')}}"
            placeholder="Product Attribute Code" required>
    </div>
    <div class="col-lg-4">
        <label for="product_attribute_name">Product Attribute Name<span class="text-danger">*</span></label>
        <input type="text" name="product_attribute_name" id="" class="form-control"
            value="{{$attribute->product_attribute_name ?? old('product_attribute_name')}}"
            placeholder="Product Attribute Name" required>
    </div>
    <div class="col-lg-4">
        <label for="input_type">Input Type<span class="text-danger">*</span></label>
        <select class="form-control select2" style="width: 100%;" name="input_type">
            <option value="1" {{$attribute->input_type == "Drop Down" ? 'selected' : ''}}>Drop Down</option>
            <option value="2" {{$attribute->input_type == "Radio" ? 'selected' : ''}}>Radio</option>
            <option value="3" {{$attribute->input_type == "Text" ? 'selected' : ''}}>Text</option>
            <option value="4" {{$attribute->input_type == "Text Area" ? 'selected' : ''}}>Text Area</option>
        </select>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-6">
        <label for="is_filterable">Filterable ?<span class="text-danger">*</span></label>
        <input type="hidden" name="is_filterable" value="0">
        <input type="checkbox" id="is_filterable" name="is_filterable"
            {{!empty($attribute) ? $attribute->is_filterable ? 'checked' : '' : ''}} data-bootstrap-switch
            data-off-color="danger" data-on-color="success" value="1">
    </div>
    <div class="col-lg-6">
        <label for="is_filterable">Required ?<span class="text-danger">*</span></label>
        <input type="hidden" name="is_required" value="0">
        <input type="checkbox" id="is_required" name="is_required"
            {{!empty($attribute) ? $attribute->is_required ? 'checked' : '' : ''}} data-bootstrap-switch
            data-off-color="danger" data-on-color="success" value="1">
    </div>
</div>
<br>
<input type="submit" value="Submit" class="btn btn-primary btn-block">