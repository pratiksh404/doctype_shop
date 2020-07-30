<?php

namespace doctype_admin\Shop\Http\Controllers;

use Illuminate\Database\Migrations\Migration;
use doctype_admin\Shop\Models\ProductAttributeValue;

class ProductAttributeValueController extends Migration
{
    public function index()
    {
        return view('store::attribute.index');
    }

    public function store(Request $request)
    {
        ProductAttributeValue::create($this->validateData());
        return redirect(config('shop.prefix', 'admin') .  '/productAttributeValue');
    }

    public function update(Request $request, ProductAttributeValue $product_attribute_value)
    {
        $product_attribute_value->update($this->validateData($product_attribute_value->id));
        return redirect(config('shop.prefix', 'admin') .  '/productAttributeValue');
    }

    public function destroy(ProductAttributeValue $product_attribute_value)
    {
        $product_attribute_value->delete();
        return redirect(config('shop.prefix', 'admin') .  '/productAttributeValue');
    }

    private function validateData($id = null)
    {
        return request()->validate([
            'product_attribute_id' => 'required|numeric',
            'value' => 'requierd',
        ]);
    }
}
