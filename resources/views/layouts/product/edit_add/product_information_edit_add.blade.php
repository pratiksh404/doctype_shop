<div class="row">
    <div class="col-5 col-sm-3">
        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="vert-tabs-basic-info-tab" data-toggle="pill" href="#vert-tabs-basic-info"
                role="tab" aria-controls="vert-tabs-basic-info" aria-selected="true">Basic Info</a>
            <a class="nav-link" id="vert-tabs-product-value-tab" data-toggle="pill" href="#vert-tabs-product-value"
                role="tab" aria-controls="vert-tabs-product-value" aria-selected="false">Product Value</a>
            <a class="nav-link" id="vert-tabs-product-seo-tab" data-toggle="pill" href="#vert-tabs-product-seo"
                role="tab" aria-controls="vert-tabs-product-seo" aria-selected="false">Product SEO</a>
            <hr>
            <button type="submit" class="btn btn-primary m-2">Create Product</button>
        </div>
    </div>
    <div class="col-7 col-sm-9">
        <div class="tab-content" id="vert-tabs-tabContent">
            <div class="tab-pane text-left fade show active" id="vert-tabs-basic-info" role="tabpanel"
                aria-labelledby="vert-tabs-basic-info-tab">
                @include('shop::layouts.product.vertical_tab.basic_info')
            </div>
            <div class="tab-pane fade" id="vert-tabs-product-value" role="tabpanel"
                aria-labelledby="vert-tabs-product-value-tab">
                @include('shop::layouts.product.vertical_tab.product_value')
            </div>
            <div class="tab-pane fade" id="vert-tabs-product-seo" role="tabpanel"
                aria-labelledby="vert-tabs-product-seo-tab">
                @include('shop::layouts.product.vertical_tab.product_seo')
            </div>
        </div>
    </div>
</div>