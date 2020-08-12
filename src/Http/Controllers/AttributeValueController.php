<?php

namespace doctype_admin\Shop\Http\Controllers;

use Illuminate\Database\Migrations\Migration;
use doctype_admin\Shop\Models\Attrvalue;

class AttributeValueController extends Migration
{
    public function index()
    {
        return view('shop::attribute_value.index');
    }

    public function store(Request $request)
    {
        Attrvalue::create($this->validateData());
        return redirect(config('shop.prefix', 'admin') .  '/attrvalue');
    }

    public function update(Request $request, Attrvalue $attrvalue)
    {
        $attrvalue->update($this->validateData($attrvalue->id));
        return redirect(config('shop.prefix', 'admin') .  '/attrvalue');
    }

    public function destroy(Attrvalue $attrvalue)
    {
        $attrvalue->delete();
        return redirect(config('shop.prefix', 'admin') .  '/attrvalue');
    }

    private function validateData($id = null)
    {
        return request()->validate([
            'product_attribute_id' => 'required|numeric',
            'value' => 'requierd',
        ]);
    }
}
