<?php

namespace doctype_admin\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use doctype_admin\Shop\Models\ProductCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $product_categories = ProductCategory::all();
        return view('shop::category.index', compact('product_categories'));
    }

    public function create()
    {
        return view('shop::category.create');
    }

    public function store(Request $request)
    {
        $category = ProductCategory::create($this->validateData());
        $this->uploadImage($category);
        return redirect(config('shop.prefix', 'admin/shop') .  '/category');
    }

    public function edit(ProductCategory $category)
    {
        return view('shop::category.edit', compact('category'));
    }

    public function update(Request $request, ProductCategory $category)
    {
        $category->update($this->validateData($category));
        $this->uploadImage($category);
        return redirect(config('shop.prefix', 'admin/shop') .  '/category');
    }

    public function destroy(ProductCategory $category)
    {
        $category->delete();
        return redirect(config('shop.prefix', 'admin/shop') .  '/category');
    }

    private function validateData($category = null)
    {
        return tap(
            request()->validate([
                'category_name' => 'required|max:100',
                'category_slug' => 'required|max:100:unique:product_categories,category_slug,' . $category ?? $category->id,
                'category_description' => 'sometimes|max:2000',
                'category_icon' => 'sometimes|max:50',
                'category_featured' => 'required|numeric'
            ]),
            function () {
                request()->has('category_image') ? request()->validate(['category_image' => 'sometimes|file|image|max:3000']) : '';
            }
        );
    }

    private function uploadImage($category)
    {
        $category_thumbnails = [
            'storage' => 'uploads/shop/category',
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
        return $category->makeThumbnail('category_image', $category_thumbnails);
    }

    public function check_category_slug(Request $request)
    {
        $slug = SlugService::createSlug(ProductCategory::class, 'category_slug', $request->category_name);
        return response()->json(['category_slug' => $slug]);
    }
}
