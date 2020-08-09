<div class="card card-primary card-tabs">
    <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-one-product-information-tab" data-toggle="pill"
                    href="#custom-tabs-one-product-information" role="tab"
                    aria-controls="custom-tabs-one-product-information" aria-selected="true">Product Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-product-images-tab" data-toggle="pill"
                    href="#custom-tabs-one-product-images" role="tab" aria-controls="custom-tabs-one-product-images"
                    aria-selected="false">Product Images</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill"
                    href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages"
                    aria-selected="false">Messages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill"
                    href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings"
                    aria-selected="false">Settings</a>
            </li>
        </ul>
    </div>

    <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-one-product-information" role="tabpanel"
                aria-labelledby="custom-tabs-one-product-information-tab">
                @include('shop::layouts.product.horizontal_tab.product_information')
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-product-images" role="tabpanel"
                aria-labelledby="custom-tabs-one-product-images-tab">
                @include('shop::layouts.product.horizontal_tab.product_images')
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel"
                aria-labelledby="custom-tabs-one-messages-tab">
                Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi
                placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique
                nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna
                a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus
                efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex
                vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget
                sem eu risus tincidunt eleifend ac ornare magna.
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel"
                aria-labelledby="custom-tabs-one-settings-tab">
                Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare
                sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie
                tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec
                pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl
                commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
            </div>
        </div>
    </div>
    <!-- /.card -->
</div>