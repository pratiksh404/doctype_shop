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

                 // Product Slug Generation
                $('#product_name').change(function(e) {
                    $.get('{{ route('check_product_slug') }}',
                      { 'product_name': $(this).val() },
                        function( data ) {
                        $('#product_slug').val(data.product_slug);
                      }
                    );
                });

                // Product SEO Generation
                $('#product_name').on('change',function(){
                  var product_name = $(this).val();
                  $('#product_meta_name').val(product_name);
                });

                // Product Tags

                $('#tags').selectize({
                    plugins: ['restore_on_backspace'],
                    plugins: ['remove_button'],
                    delimiter: ',',
                    persist: false,
                    valueField: 'tag',
                    labelField: 'tag',
                    searchField: 'tag',
                    options: tags,
                    items : tags,
                    create: function(input,callback) {
                    return {
                    tag: input
                    },
                    callback({ tag: input });
                    }
                    });

$('#keywords').selectize({
    plugins: ['restore_on_backspace'],
    plugins: ['remove_button'],
    delimiter: ',',
    persist: false,
    valueField: 'keyword',
    labelField: 'keyword',
    searchField: 'keyword',
    options: keywords,
    items : keywords,
    create: function(input,callback) {
    return {
    keyword: input
    },
    callback({ keyword: input });
    }
    });


        });


</script>