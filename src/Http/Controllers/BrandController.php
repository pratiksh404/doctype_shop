<?php

namespace doctype_admin\Shop\Http\Controllers;

use Illuminate\Routing\Controller;
use doctype_admin\Shop\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        /* $product_categories = Productbrand::all(); */
        return view('shop::brand.index');
    }

    public function store(Request $request)
    {
        $product_brand = Brand::create($this->validateData());
        $this->uploadImage($product_brand);
        redirect(config('shop.prefix', 'admin') .  '/brand');
    }

    public function update(Request $request, Brand $product_brand)
    {
        $product_brand->update($this->validateData());
        $this->uploadImage($product_brand);
        redirect(config('shop.prefix', 'admin') .  '/brand');
    }

    public function destroy(Brand $product_brand)
    {
        $product_brand->delete();
        return redirect(config('shop.prefix', 'admin') .  '/brand');
    }

    private function validateData()
    {
        return tap(
            request()->validate([
                'brand_name' => 'required|max:100',
                'brand_description' => 'sometimes|max:2000',
            ]),
            function () {
                request()->has('brand_image') ? request()->validate(['brand_image' => 'sometimes|file|image|max:2000']) : '';
            }
        );
    }

    private function uploadImage($product_brand)
    {
        $brand_thumbnails = [
            'storage' => 'uploads/shop/brand',
            'width' => '300',
            'height' => '300',
            'quality' => '80',
            'thumbnails' => [
                [
                    'thumbnail-name' => 'small',
                    'thumbnail-width' => '150',
                    'thumbnail-height' => '150',
                    'thumbnail-quality' => '30'
                ]
            ]
        ];
        return $product_brand->makeThumbnail('brand_image', $brand_thumbnails);
    }
}
