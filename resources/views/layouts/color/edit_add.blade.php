<div class="row">
    <label for="color">Product Color</label>
    <div class="input-group my-colorpicker2">
        <input type="text" class="form-control" id="color" name="color" value="{{$color->color ?? old('color')}}"
            required>

        <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-square"></i></span>
        </div>
    </div>
</div>