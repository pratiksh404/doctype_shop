<script>
    $(function() {
            // Select2
            $('.select2').select2()

            // Summernote
            $('.textarea').summernote();

            //Initialize Bootstrap Switch
                    $("input[data-bootstrap-switch]").each(function () {
                    $(this).bootstrapSwitch('state', $(this).prop('checked'));
                    });

            // Datatable
            $("#datatable").DataTable({
                "responsive": true,
                "autoWidth": true,
                "ordering": true,
                "info": true,
            });

            $('document').ready(function(){              
if($('#product_attribute_code').val().length == 0)
{
    var code = 'attribute' + Math.floor((Math.random() * 10000) + 1);
                    $('#product_attribute_code').val(code);          
}
});

        });

</script>