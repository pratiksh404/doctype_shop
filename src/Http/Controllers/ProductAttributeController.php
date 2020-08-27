<?php

namespace doctype_admin\Shop\Http\Controllers;

use doctype_admin\Shop\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use doctype_admin\Shop\Models\Product;

class ProductAttributeController extends Controller
{
    public function create($id)
    {
        $product = Product::findOrFail($id);
        $attributes = Attribute::all(['id', 'product_attribute_name']);
        return view('shop::product.create.product_attribute', compact('product', 'attributes'));
    }

    public function store($id)
    {
        $product = Product::findOrFail($id);
        if (request()->product_attributes) {
            $product->attributes()->sync(request()->product_attributes);
            foreach ($product->attributes as $attribute) {
                $attribute_value_fieldname = $attribute->product_attribute_name;
                if (request()->$attribute_value_fieldname) {
                    $attribute->product_attributes_value->sync(request()->$attribute_value_fieldname);
                }
            }
        }
    }
}
