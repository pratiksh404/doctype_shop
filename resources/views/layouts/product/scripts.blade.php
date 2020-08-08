<link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
<script src="http://hayageek.github.io/jQuery-Upload-File/4.0.11/jquery.uploadfile.min.js"></script>
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

               // Product Code Geneation
            $('document').ready(function(){
                if($('#product_code').val().length == 0)
                    {
                    var code = 'product_' + Math.floor((Math.random() * 10000) + 1);
                    $('#product_code').val(code);
                    $('.show_product_code').text(code);
                    }
                });

                $('#product_name').change(function(e) {
                    $.get('{{ route('check_product_slug') }}',
                      { 'product_name': $(this).val() },
                        function( data ) {
                        $('#product_slug').val(data.product_slug);
                      }
                    );
                });

        });


</script>