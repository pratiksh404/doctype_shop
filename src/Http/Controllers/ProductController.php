<?php

namespace doctype_admin\Shop\Http\Controllers;

use Illuminate\Routing\Controller;
use doctype_admin\Shop\Models\Brand;
use doctype_admin\Shop\Models\Product;
use Illuminate\Support\Facades\Request;
use doctype_admin\Shop\Models\ProductCategory;
use doctype_admin\Shop\Models\ProductSubCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProductController extends Controller
{
    public function index()
    {
        return view('shop::product.index');
    }

    /*     public function create()
    {
        $product_categories = ProductCategory::all(['id', 'category_name']);
        $product_sub_categories = ProductSubCategory::all(['id', 'sub_category_name']);
        $product_brands = Brand::all(['id', 'brand_name']);
        return view('shop::product.create', compact('product_categories', 'product_sub_categories', 'product_brands'));
    } */

    public function product_information_create()
    {
        $product_categories = ProductCategory::all(['id', 'category_name']);
        $product_sub_categories = ProductSubCategory::all(['id', 'sub_category_name']);
        $product_brands = Brand::all(['id', 'brand_name']);
        return view('shop::product.create.product_information', compact('product_categories', 'product_sub_categories', 'product_brands'));
    }

    public function product_image_create($id)
    {
        $product = Product::findOrFail($id);
        return view('shop::product.create.product_image', compact('product'));
    }

    public function store(Request $request)
    {
        $product = Product::create($this->validateData());
        return redirect(config('shop.prefix', 'admin/shop') .  '/product');
    }

    public function edit(Product $product)
    {
        return view('shop::product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($this->validateData($product->id));
        return redirect(config('shop.prefix', 'admin/shop') .  '/product');
    }

    private function validateData($id = null)
    {
        return request()->validate(
            [
                'product_code' => 'required|max:255|unique:products,product_code,' . $id,
                'product_name' => 'required|max:255',
                'user_id' => 'required|numeric',
                'product_slug' => 'required|max:255|unique:products,product_slug,' . $id,
                'product_category_id' => 'required|numeric',
                'product_sub_category_id' => 'required|numeric',
                'brand_id' => 'required|numeric',
                'product_video' => 'max:255',
                'product_excerpt' => 'required|max:255',
                'product_description' => 'max:5000',
                'product_unit_price' => 'required|numeric',
                'product_cost_price' => 'required|numeric',
                'product_featured' => 'required|numeric',
                'product_published' => 'required|numeric',
                'product_stock' => 'required|numeric',
                'product_meta_name' => 'max:255',
                'product_meta_description' => 'max:5000'
            ]
        );
    }

    private function productImageValidate()
    {
        return tap(
            request()->validate([
                'product_image_type' => 'required|numeric'
            ]),
            function () {
                request()->has('product_image') ? request()->validate(['product_image' => 'required|file|image|max:3000']) : '';
            }
        );
    }

    public function check_product_slug()
    {
        $slug = SlugService::createSlug(Product::class, 'product_slug', request()->product_name);
        return response()->json(['product_slug' => $slug]);
    }
}
