<?php

namespace doctype_admin\Shop\Http\Controllers;

use doctype_admin\Shop\Models\ProductAttribute;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Request;

class ProductAttributeController extends Controller
{
    public function index()
    {
        return view('store::attribute.index');
    }

    public function store(Request $request)
    {
        ProductAttribute::create($this->validateData());
        return redirect(config('shop.prefix', 'admin') .  '/productAttribute');
    }

    public function update(Request $request, ProductAttribute $product_attribute)
    {
        $product_attribute->update($this->validateData($product_attribute->id));
        return redirect(config('shop.prefix', 'admin') .  '/productAttribute');
    }

    public function destroy(ProductAttribute $product_attribute)
    {
        $product_attribute->delete();
        return redirect(config('shop.prefix', 'admin') .  '/productAttribute');
    }

    private function validateData($id = null)
    {
        return request()->validate([
            'product_attribute_code' => 'required|max:50|unique:product_attributes,code,' . $id ?? '',
            'product_attribute_name' => 'requierd|max:100',
            'input_type' => 'required|numeric',
            'is_filterable' => 'required|bool',
            'is_required' => 'required|bool',
        ]);
    }
}
