<?php

use doctype_admin\Shop\Models\ProductSubCategory;
use Illuminate\Database\Seeder;

class ProductSubCategoryTableSeeder extends Seeder
{
    /**
     *
     *Run Seeder
     *
     *@return void
     *
     */
    public function run()
    {
        $sub_categories = [
            [
                "product_category_id" => 1,
                "sub_category_name" => "Shirt",
                "sub_category_slug" => "shirt",
                "sub_category_description" => "",
                "sub_category_icon" => "fa fa-shirt",
                "sub_category_image" => "",
                "sub_category_featured" => 0,
                "sub_category_status" => 1
            ],
            [
                "product_category_id" => 2,
                "sub_category_name" => "Skirt",
                "sub_category_slug" => "skirt",
                "sub_category_description" => "",
                "sub_category_icon" => "fa fa-shirt",
                "sub_category_image" => "",
                "sub_category_featured" => 0,
                "sub_category_status" => 1
            ]
        ];
        foreach ($sub_categories as $sub_category) {
            ProductSubCategory::create($sub_category);
        }
    }
}
