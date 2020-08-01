<?php

namespace doctype_admin\Shop\Http\Controllers;

use doctype_admin\Shop\Models\ProductAttribute;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Request;

class ProductAttributeController extends Controller
{
    public function index()
    {
        $product_attributes = ProductAttribute::all();
        return view('shop::attribute.index', compact('product_attributes'));
    }

    public function create()
    {
        return view('shop::attribute.create');
    }

    public function store(Request $request)
    {
        ProductAttribute::create($this->validateData());
        return redirect(config('shop.prefix', 'admin/shop') .  '/attribute');
    }

    public function edit(ProductAttribute $attribute)
    {
        return view('shop::attribute.edit', compact('attribute'));
    }

    public function update(Request $request, ProductAttribute $attribute)
    {
        $attribute->update($this->validateData($attribute->id));
        return redirect(config('shop.prefix', 'admin/shop') .  '/attribute');
    }

    public function destroy(ProductAttribute $attribute)
    {
        $attribute->delete();
        return redirect(config('shop.prefix', 'admin/shop') .  '/attribute');
    }

    private function validateData($id = null)
    {
        return request()->validate([
            'product_attribute_code' => 'required|max:50|unique:product_attributes,product_attribute_code,' . $id ?? '',
            'product_attribute_name' => 'required|max:100',
            'input_type' => 'required|numeric',
            'is_filterable' => 'required|bool',
            'is_required' => 'required|bool',
        ]);
    }
}
