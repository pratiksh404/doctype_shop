<?php

namespace doctype_admin\Shop\Http\Controllers;

use Illuminate\Routing\Controller;
use doctype_admin\Shop\Models\Product;

class ProductImageController extends Controller
{

    public function create($id)
    {
        $product = Product::findOrFail($id);
        return view('shop::product.create.product_image', compact('product'));
    }

    public function store($id)
    {
        $product = Product::findOrFail($id);
        $this->productImageValidate();
        foreach (request()->product_images as $product_image) {
            $img = $product->images()->create([
                'product_image_type' => request()->product_image_type,
                'product_image' => $product_image
            ]);
            $this->uploadImage($img, $product_image, $product);
        }

        return redirect(config('shop.prefix', 'admin/shop') .  '/product/' . $product->id . '/product-image/create');
    }

    private function productImageValidate()
    {
        return tap(
            request()->validate([
                'product_image_type' => 'required|numeric'
            ]),
            function () {
                request()->has('product_images') ? request()->validate(
                    [
                        'product_images' => 'required',
                        'product_images.*' => 'file|image|max:3000'
                    ]
                ) : '';
            }
        );
    }

    private function uploadImage($img, $product_image, $product)
    {

        $multi = [
            'storage' => 'uploads/shop/product/' . $product->id,
            'width' => '600',
            'height' => '600',
            'quality' => '80',
            'image' => $product_image,
            'thumbnails' => [
                [
                    'thumbnail-name' => 'medium',
                    'thumbnail-width' => '300',
                    'thumbnail-height' => '300',
                    'thumbnail-quality' => '50',
                ],
                [
                    'thumbnail-name' => 'small',
                    'thumbnail-width' => '150',
                    'thumbnail-height' => '150',
                    'thumbnail-quality' => '30',
                ]
            ]
        ];

        return $img->makeThumbnail('product_image', $multi);
    }
}
