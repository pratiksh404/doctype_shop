<?php

namespace doctype_admin\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use doctype_admin\Shop\Models\Size;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::all();
        return view('shop::size.index', compact('sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $size = Size::create($this->validateData());
        return redirect(config('shop.prefix', 'admin/shop') .  '/size');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  request
     * @param  \doctype_admin\Shop\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        $size->update($this->validateData());
        return redirect(config('shop.prefix', 'admin/shop') .  '/size');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \doctype_admin\Shop\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $size)
    {
        $size->delete();
        return redirect(config('shop.prefix', 'admin/shop') .  '/size');
    }

    private function validateData()
    {
        return request()->validate([
            'size' => 'required|max:255'
        ]);
    }
}
