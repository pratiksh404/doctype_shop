<?php

namespace doctype_admin\Shop\Http\Controllers;

use doctype_admin\Shop\Models\Attribute;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Request;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::with('attrvalues')->get();
        return view('shop::attribute.index', compact('attributes'));
    }

    public function create()
    {
        return view('shop::attribute.create');
    }

    public function store(Request $request)
    {
        Attribute::create($this->validateData());
        return redirect(config('shop.prefix', 'admin/shop') .  '/attribute');
    }

    public function edit(Attribute $attribute)
    {
        return view('shop::attribute.edit', compact('attribute'));
    }

    public function update(Request $request, Attribute $attribute)
    {
        $attribute->update($this->validateData($attribute->id));
        return redirect(config('shop.prefix', 'admin/shop') .  '/attribute');
    }

    public function destroy(Attribute $attribute)
    {
        $attribute->delete();
        return redirect(config('shop.prefix', 'admin/shop') .  '/attribute');
    }

    private function validateData($id = null)
    {
        return request()->validate([
            'product_attribute_code' => 'required|max:50|unique:attributes,product_attribute_code,' . $id ?? '',
            'product_attribute_name' => 'required|max:100',
            'input_type' => 'required|numeric',
            'is_filterable' => 'required|bool',
            'is_required' => 'required|bool',
        ]);
    }
}
