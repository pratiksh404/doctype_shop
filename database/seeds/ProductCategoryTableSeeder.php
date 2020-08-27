<?php

use doctype_admin\Shop\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategoryTableSeeder extends Seeder
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
        $categories = [
            [
                "category_name" => "Men Fashion",
                "category_slug" => "men_fashion",
                "category_description" => "",
                "category_icon" => "fa fa-male",
                "category_image" => "",
                "category_featured" => 0
            ],
            [
                "category_name" => "Woman Fashion",
                "category_slug" => "woman_fashion",
                "category_description" => "",
                "category_icon" => "fa fa-female",
                "category_image" => "",
                "category_featured" => 0
            ]
        ];
        foreach ($categories as $category) {
            ProductCategory::create($category);
        }
    }
}
