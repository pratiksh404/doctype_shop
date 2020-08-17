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
                var product_attributes = $(this).val();
if(product_attributes) {
    $.ajax({
                    url : "{{ route('productattribute') }}",
                    type : "POST",
                    data : {
                    'product_attributes' : product_attributes
                    },
                    success : function(data) {
                    console.log(data);
                    $('#test').html(data);
                    }
                    });
} else { console.log("Product Attribute NULL")}
            });
        });
</script>