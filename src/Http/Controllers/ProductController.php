<?php

namespace doctype_admin\Shop\Http\Controllers;

use Illuminate\Routing\Controller;
use doctype_admin\Shop\Models\Brand;
use doctype_admin\Shop\Models\Product;
use Illuminate\Support\Facades\Request;
use doctype_admin\Shop\Models\ProductCategory;
use doctype_admin\Shop\Models\ProductSubCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use doctype_admin\Shop\Models\Attribute;

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
        /* Retriving Tags */
        $tags = config('shop.product_tagging', 'true') == true ? Product::existingTags()->pluck('name') : false;

        return view('shop::product.create.product_information', compact('product_categories', 'product_sub_categories', 'product_brands', 'tags'));
    }

    public function store(Request $request)
    {
        $product = Product::create($this->validateData());
        if (config('blog.product_tagging', 'true')) {
            /* Assigning tags */
            $product->tag(explode(',', request()->tags));
        }
        return redirect(config('shop.prefix', 'admin/shop') .  '/product');
    }

    public function edit(Product $product)
    {
        /* Retriving tags */
        $tags = config('blog.product_tagging', 'true') == true ? $product->existingTags()->pluck('name') : false;
        $remove_tags = config('blog.product_tagging', 'true') == true ? $product->tagged->pluck('tag_name') : false;
        return view('shop::product.edit', compact('product', 'tags', 'remove_tags'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($this->validateData($product->id));
        if (config('blog.product_tagging', 'true')) {
            /* Assigning tags */
            $product->tag(explode(',', request()->tags));
            /* ---------------- */
            /* Removing tags */
            if (!empty(request()->remove_tags)) {
                $product->untag(request()->remove_tags);
            }
            /* ------------------ */
        }
        return redirect(config('shop.prefix', 'admin/shop') .  '/product');
    }

    public function findsubcategory(Request $request)
    {
        $product_category_id = request()->product_category_id;

        $subcategories = ProductSubCategory::where('id', $product_category_id)->firstOrFail();

        return response()->json([
            'subcategories' => $subcategories
        ]);
    }

    public function findproductattribute()
    {
        $product_attributes_ids = request()->product_attributes;
        $product_attributes = is_array($product_attributes_ids) ? Attribute::whereIn('id', $product_attributes_ids)->with('attrvalues')->get() : null;
        return response()->json([
            'product_attributes' => $product_attributes
        ]);
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
                'product_meta_description' => 'max:5000',
                'product_meta_keywords' => 'sometimes'
            ]
        );
    }


    public function check_product_slug()
    {
        $slug = SlugService::createSlug(Product::class, 'product_slug', request()->product_name);
        return response()->json(['product_slug' => $slug]);
    }
}
