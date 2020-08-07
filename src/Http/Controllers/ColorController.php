<?php

namespace doctype_admin\Shop\Http\Controllers;

use doctype_admin\Shop\Models\Color;
use Illuminate\Routing\Controller;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::all();
        return view('shop::branch.index', compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $color = Color::create($this->validateData());
        return redirect(config('shop.prefix', 'admin/shop') .  '/color');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  request
     * @param  \doctype_admin\Shop\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        $color->update($this->validateData());
        return redirect(config('shop.prefix', 'admin/shop') .  '/color');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \doctype_admin\Shop\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        $color->delete();
        return redirect(config('shop.prefix', 'admin/shop') .  '/color');
    }

    private function validateData()
    {
        return request()->validate([
            'color' => 'required|max:255'
        ]);
    }
}
