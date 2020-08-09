<form action="{{ url(config('shop.prefix', 'admin/shop') . '/product') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('shop::layouts.product.edit_add.product_information_edit_add')
</form>