<form action="" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- Name/Description fields, irrelevant for this article --}}

    <div class="form-group">
        <label for="document">Documents</label>
        <div class="needsclick dropzone" id="document-dropzone">

        </div>
    </div>
    <div>
        <input class="btn btn-danger" type="submit">
    </div>
</form>