<?php

namespace doctype_admin\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use doctype_admin\Shop\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function index()
    {
        /* $product_categories = ProductCategory::all(); */
        return view('shop::category.index');
    }

    public function store(Request $request)
    {
        $product_category = ProductCategory::create($this->validateData());
        $this->uploadImage($product_category);
        redirect(config('shop.prefix', 'admin') .  '/productCategory');
    }

    public function update(Request $request, ProductCategory $product_category)
    {
        $product_category->update($this->validateData());
        $this->uploadImage($product_category);
        redirect(config('shop.prefix', 'admin') .  '/productCategory');
    }

    public function destroy(ProductCategory $product_category)
    {
        $product_category->delete();
        return redirect(config('shop.prefix', 'admin') .  '/productCategory');
    }

    private function validateData()
    {
        return tap(
            request()->validate([
                'category_name' => 'required|max:100',
                'category_description' => 'sometimes|max:2000',
                'category_icon' => 'sometimes|max:50',
                'category_featured' => 'required|numeric'
            ]),
            function () {
                request()->has('category_image') ? request()->validate(['category_image' => 'sometimes|file|image|max:2000']) : '';
            }
        );
    }

    private function uploadImage($product_category)
    {
        $category_thumbnails = [
            'storage' => 'uploads/shop/product/category',
            'width' => '600',
            'height' => '400',
            'quality' => '80',
            'thumbnails' => [
                [
                    'thumbnail-name' => 'medium',
                    'thumbnail-width' => '300',
                    'thumbnail-height' => '200',
                    'thumbnail-quality' => '50'
                ],
                [
                    'thumbnail-name' => 'small',
                    'thumbnail-width' => '150',
                    'thumbnail-height' => '100',
                    'thumbnail-quality' => '30'
                ]
            ]
        ];
        return $product_category->makeThumbnail('category_image', $category_thumbnails);
    }
}
