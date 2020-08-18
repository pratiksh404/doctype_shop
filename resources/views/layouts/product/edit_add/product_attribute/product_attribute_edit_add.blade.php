<div class="row">
    <div class="col-lg-12">
        <select name="product_attributes" class="select2" multiple="multiple" data-placeholder="Select Attributes"
            style="width: 100%;" id="product_attributes">
            @foreach ($attributes as $attribute)
            <option value="{{$attribute->id}}">{{$attribute->product_attribute_name}}</option>
            @endforeach
        </select>
    </div>
</div>
<br>
<div id="product_attributes_values" class="product_attributes_values" style="height: 60vh">

</div>