<?php

namespace doctype_admin\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use doctype_admin\Shop\Models\ProductCategory;
use doctype_admin\Shop\Models\ProductSubCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProductSubCategoryController extends Controller
{
    public function index()
    {
        $product_sub_categories = ProductSubCategory::with('category');
        return view('shop::sub_category.index', compact('product_sub_categories'));
    }

    public function create()
    {
        $product_categories = ProductCategory::all(['id', 'category_name']);
        return view('shop::sub_category.create', compact('product_categories'));
    }

    public function store(Request $request)
    {
        $productSubCategory = ProductSubCategory::create($this->validateData());
        $this->uploadImage($productSubCategory);
        redirect(config('shop.prefix', 'admin') .  '/product-sub-category');
    }

    public function update(Request $request, ProductSubCategory $productSubCategory)
    {
        $productSubCategory->update($this->validateData($productSubCategory));
        $this->uploadImage($productSubCategory);
        redirect(config('shop.prefix', 'admin') .  '/product-sub-category');
    }

    public function destroy(ProductSubCategory $productSubCategory)
    {
        $productSubCategory->delete();
        return redirect(config('shop.prefix', 'admin') .  '/product-sub-category');
    }

    private function validateData($productSubCategory = null)
    {
        return tap(
            request()->validate([
                'product_category_id' => 'required|numeric',
                'sub_category_name' => 'required|max:100',
                'sub_category_slug' => 'required|max:100:unique:product_sub_categories,sub_category_slug,' . $productSubCategory ?? $productSubCategory->id,
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

    private function uploadImage($productSubCategory)
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
        return $productSubCategory->makeThumbnail('sub_category_image', $category_thumbnails);
    }

    public function check_sub_category_slug(Request $request)
    {
        $slug = SlugService::createSlug(ProductSubCategory::class, 'sub_category_slug', $request->sub_category_name);
        return response()->json(['sub_category_slug' => $slug]);
    }
}
