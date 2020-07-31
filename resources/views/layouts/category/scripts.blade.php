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

            $('#category_name').change(function(e) {
            $.get('{{ route('check_category_slug') }}',
            { 'category_name': $(this).val() },
            function( data ) {
            $('#category_slug').val(data.category_slug);
            }
            );
            });

        });

</script>