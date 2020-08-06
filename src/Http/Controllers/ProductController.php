<?php

namespace doctype_admin\Shop\Http\Controllers;

use doctype_admin\Shop\Models\Brand;
use doctype_admin\Shop\Models\Product;
use doctype_admin\Shop\Models\ProductCategory;
use doctype_admin\Shop\Models\ProductSubCategory;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('shop::product.index');
    }

    public function create()
    {
        $product_categories = ProductCategory::all(['id', 'category_name']);
        $product_sub_categories = ProductSubCategory::all(['id', 'sub_category_name']);
        $product_brands = Brand::all(['id', 'brand_name']);
        return view('shop::product.create', compact('product_categories', 'product_sub_categories', 'product_brands'));
    }

    public function store(Request $request)
    {
        $product = Product::create($this->validateData());
        $this->uploadImage($product);
        return redirect(config('shop.prefix', 'admin/shop') .  '/product');
    }

    public function edit(Product $product)
    {
        return view('shop::product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($this->validateData($product));
        $this->uploadImage($product);
        return redirect(config('shop.prefix', 'admin/shop') .  '/product');
    }

    private function validateData()
    {
        return tap(
            request()->validate(
                [
                    'product_name' => 'required|max:255',
                    'user_id' => 'required|numeric',
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
                ]
            ),
            function () {
                /*      if (request()->has('product_images')) {
                    $images = request()->has('product_images');
                    foreach ($images as $image) {
                        validate([$image => 'file|image|max:3000']);
                    }
                } */
                request()->has('product_images') ? request()->validate(['product_images.*' => 'sometimes|file|image|max:3000']) : '';
                request()->has('product_featured_img') ? request()->validate(['product_featured_img' => 'sometimes|file|image|max:3000']) : '';
                request()->has('product_flash_deal_img') ? request()->validate(['product_featured_img' => 'sometimes|file|image|max:3000']) : '';
            }
        );
    }

    private function uploadImage($product)
    {
        $this->productFeaturedImage($product);
        $this->productFlashDealImage($product);
        $this->productImages($product);
    }

    private function productFeaturedImage($product)
    {
        $featured_image = [
            'storage' => 'uploads/shop/product/featured/' . $product->id,
            'width' => '600',
            'height' => '600',
            'quality' => '80',
            'thumbnails' => [
                [
                    'thumbnail-name' => 'small',
                    'thumbnail-width' => '300',
                    'thumbnail-height' => '300',
                    'thumbnail-quality' => '50'
                ],
                [
                    'thumbnail-name' => 'small',
                    'thumbnail-width' => '150',
                    'thumbnail-height' => '150',
                    'thumbnail-quality' => '30'
                ]
            ]
        ];

        $product->makeThumbnail('product_featured_img', $featured_image);
    }

    private function productFlashDealImage($product)
    {
        $flash_deal_image = [
            'storage' => 'uploads/shop/product/flashdeal/' . $product->id,
            'width' => '800',
            'height' => '600',
            'quality' => '80',
            'thumbnails' => [
                [
                    'thumbnail-name' => 'small',
                    'thumbnail-width' => '400',
                    'thumbnail-height' => '300',
                    'thumbnail-quality' => '50'
                ],
                [
                    'thumbnail-name' => 'small',
                    'thumbnail-width' => '200',
                    'thumbnail-height' => '150',
                    'thumbnail-quality' => '30'
                ]
            ]
        ];

        $product->makeThumbnail('product_featured_img', $flash_deal_image);
    }

    private function productImages($product)
    {
        $images = [
            'storage' => 'uploads/shop/product/' . $product->id,
            'width' => '800',
            'height' => '600',
            'quality' => '80',
            'thumbnails' => [
                [
                    'thumbnail-name' => 'small',
                    'thumbnail-width' => '400',
                    'thumbnail-height' => '300',
                    'thumbnail-quality' => '50'
                ],
                [
                    'thumbnail-name' => 'small',
                    'thumbnail-width' => '200',
                    'thumbnail-height' => '150',
                    'thumbnail-quality' => '30'
                ]
            ]
        ];

        $product->makeThumbnail('product_images', $images);
    }
}
