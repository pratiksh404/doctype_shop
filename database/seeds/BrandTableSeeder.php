<?php

use Illuminate\Database\Seeder;
use doctype_admin\Shop\Models\Brand;

class BrandTableSeeder extends Seeder
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
        $brands = [
            [
                "brand_name" => "Nike",
                "brand_slug" => "nike",
                "brand_image" => "",
                "brand_description" => ""
            ],
            [
                "brand_name" => "Adidas",
                "brand_slug" => "adidas",
                "brand_image" => "",
                "brand_description" => ""
            ]
        ];
        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}
