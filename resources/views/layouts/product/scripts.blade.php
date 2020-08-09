<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.js"></script>
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

                // Drop Zone
var uploadedDocumentMap = {}
  Dropzone.options.documentDropzone = {
   url: '{{ url(config('shop.prefix', 'admin/shop') . '/product') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
      uploadedDocumentMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentMap[file.name]
      }
      $('form').find('input[name="document[]"][value="' + name + '"]').remove()
    },
    init: function () {
      @if(isset($project) && $project->document)
        var files =
          {!! json_encode($project->document) !!}
        for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
        }
      @endif
    }
  }
        });


</script>