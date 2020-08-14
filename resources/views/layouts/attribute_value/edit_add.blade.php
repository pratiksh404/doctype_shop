<div class="row">
    <div class="col-lg-12">
        <label for="product_attribute_id">Attribute</label>
        <select name="product_attribute_id" id="product_attribute_id" class="form-control select2">
            <option value="null">Select Attribute...</option>
            @foreach ($attributes as $attribute)
            <option value="{{$attribute->id}}"
                {{isset($attribute_id) ? $attribute_id == $attribute->id ? 'selected' : '' : ''}}>
                {{$attribute->product_attribute_name}}</option>
            @endforeach
        </select>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <label for="attrvalues">Values</label>
        <input type="text" name="attrvalues" id="attrvalues" style="width:100%">

        @if (isset($attrvalues))
        <script>
            var attrvalues = [
                                           @foreach ($attrvalues as $attrvalue)
                                           {attrvalue: "{{$attrvalue}}" },
                                           @endforeach
                                       ];
        </script>
        @endif
    </div>
</div>
<br>
<input type="submit" value="Submit" class="btn btn-primary btn-block">