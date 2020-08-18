<script>
    $(function() {
            // Select2
            $('.select2').select2();
            // Atrrbiute Dependent Attribute Value

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#product_attributes').on('change',function(){
                var product_attributes = $('#product_attributes').val();
                if(typeof html != 'undefined') {$('#product_attributes_values').empty();}

if(product_attributes != '')
{
    $.ajax({
        url : "{{ route('productattribute') }}",
        type : "POST",
        data : {
        'product_attributes' : product_attributes
        },
        success : function(data) {
        $.each(data,function(key,product_attributes){
        $.each(product_attributes,function(attr_key,attr_value)
        {
            html = '<label for=" '+ (attr_value.product_attribute_name).toLowerCase() +' "> '+ attr_value.product_attribute_name +' </label>';
        html += '<select name="'+ (attr_value.product_attribute_name).toLowerCase() +'" id="'+ (attr_value.product_attribute_name).toLowerCase() +'" class="select2" multiple="multiple" data-placeholder="Select '+ attr_value.product_attribute_name +'" style="width: 100%;" id="'+ attr_value.product_attribute_name +'">';
            $.each(attr_value.attrvalues,function(key,attrvalue){
             html += '<option value="'+ attrvalue.id +'"> '+ attrvalue.value +' </option>';
            });
            html += '</select>'; 
        html += '<br>';
        $('#product_attributes_values').append(html);
        });
        });
        }
        });
}
        });
    });
</script>