<?php

namespace doctype_admin\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use doctype_admin\Shop\Models\Brand;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('shop::brand.index', compact('brands'));
    }

    public function store(Request $request)
    {
        $brand = Brand::create($this->validateData());
        $this->uploadImage($brand);
        return redirect(config('shop.prefix', 'admin/shop') .  '/brand');
    }

    public function update(Request $request, Brand $brand)
    {
        $brand->update($this->validateData());
        $this->uploadImage($brand);
        return redirect(config('shop.prefix', 'admin/shop') .  '/brand');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect(config('shop.prefix', 'admin/shop') .  '/brand');
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

    private function uploadImage($brand)
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
        return $brand->makeThumbnail('brand_image', $brand_thumbnails);
    }

    public function check_brand_slug()
    {
        $slug = SlugService::createSlug(Brand::class, 'brand_slug', request()->brand_name);
        return response()->json(['brand_slug' => $slug]);
    }
}
