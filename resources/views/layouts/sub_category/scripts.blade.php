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

            $('#sub_category_name').change(function(e) {
            $.get('{{ route('check_sub_category_slug') }}',
            { 'sub_category_name': $(this).val() },
            function( data ) {
            $('#sub_category_slug').val(data.sub_category_slug);
            }
            );
            });

        });

</script>