<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.js"></script>
<script>
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
        var name = 'image'
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
</script>