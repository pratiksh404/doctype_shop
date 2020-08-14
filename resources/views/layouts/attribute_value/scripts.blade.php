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

               // Attribute Value
                
                $('#attrvalues').selectize({
                plugins: ['restore_on_backspace'],
                plugins: ['remove_button'],
                delimiter: ',',
                persist: false,
                valueField: 'attrvalue',
                labelField: 'attrvalue',
                searchField: 'attrvalue',
                options: attrvalues,
                items : attrvalues,
                create: function(input,callback) {
                return {
                attrvalue: input
                },
                callback({ attrvalue: input });
                }
                });

        });

</script>