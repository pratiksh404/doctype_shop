<?php

namespace doctype_admin\Shop\Http\Controllers;

use Illuminate\Http\Request;
use doctype_admin\Shop\Models\Attribute;
use doctype_admin\Shop\Models\Attrvalue;
use Illuminate\Database\Migrations\Migration;

class AttributeValueController extends Migration
{
    public function create($attribute_id)
    {
        $attributes = Attribute::all(['id', 'product_attribute_name']);
        return view("shop::attribute_value.create", compact('attributes', 'attribute_id'));
    }

    public function store(Request $request)
    {
        $attribute = Attribute::where('id', request()->product_attribute_id)->firstOrFail();
        $attrvalues = explode(',', request()->attrvalues);
        foreach ($attrvalues as $attrvalue) {
            $attribute->attrvalues()->create([
                'value' => $attrvalue
            ]);
        }
        return redirect(config('shop.prefix', 'admin/shop') .  '/attrvalue');
    }

    public function destroy(Attrvalue $attrvalue)
    {
        $attrvalue->delete();
        return redirect(config('shop.prefix', 'admin/shop') .  '/attribute');
    }
}
