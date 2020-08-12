<div class="row">
    <div class="col-lg-12">
        <label for="product_meta_name">Product SEO Name</label>
        <input type="text" name="product_meta_name" class="form-control" id="product_meta_name"
            value="{{$product->product_meta_name ?? old('product_meta_name')}}" placeholder="Product SEO Name">
    </div>
    <br><br>
    <div class="col-lg-12">
        <label for="product_meta_description">Product SEO Description</label>
        <textarea name="product_meta_description" id="product_meta_description" class="textarea"></textarea>
    </div>
    <br><br>
    <div class="col-lg-12">
        <label for="product_meta_keywords">Product Meta Keywords</label>
        <input type="text" name="product_meta_keywords" id="keywords" style="width:100%">
        {{--         <script>
            var tags = [
                                       @foreach ($tags as $tag)
                                       {tag: "{{$tag}}" },
        @endforeach
        ];
        </script> --}}
    </div>
</div>