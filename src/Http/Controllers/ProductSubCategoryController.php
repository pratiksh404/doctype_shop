<?php

namespace doctype_admin\Shop\Http\Controllers;

use doctype_admin\Shop\Models\ProductSubCategory;
use Illuminate\Routing\Controller;

class ProductSubCategoryController extends Controller
{
    public function index()
    {
        return view('shop::subCategory.index');
    }


    public function store(Request $request)
    {
        $product_sub_category = ProductSubCategory::create($this->validateData());
        $this->uploadImage($product_sub_category);
        redirect(config('shop.prefix', 'admin') .  '/productSubCategory');
    }

    public function update(Request $request, ProductSubCategory $product_sub_category)
    {
        $product_sub_category->update($this->validateData());
        $this->uploadImage($product_sub_category);
        redirect(config('shop.prefix', 'admin') .  '/productSubCategory');
    }

    public function destroy(ProductSubCategory $product_sub_category)
    {
        $product_sub_category->delete();
        return redirect(config('shop.prefix', 'admin') .  '/productSubCategory');
    }

    private function validateData()
    {
        return tap(
            request()->validate([
                'product_category_id' => 'required|numeric',
                'sub_category_name' => 'required|max:100',
                'sub_category_description' => 'sometimes|max:2000',
                'sub_category_icon' => 'sometimes|max:50',
                'sub_category_featured' => 'required|numeric',
                'sub_category_status' => 'required|numeric'
            ]),
            function () {
                request()->has('sub_category_image') ? request()->validate(['category_image' => 'sometimes|file|image|max:2000']) : '';
            }
        );
    }

    private function uploadImage($product_sub_category)
    {
        $category_thumbnails = [
            'storage' => 'uploads/shop/product/subCategory',
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
        return $product_sub_category->makeThumbnail('sub_category_image', $category_thumbnails);
    }
}
