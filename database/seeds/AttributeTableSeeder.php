<?php

use doctype_admin\Shop\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributeTableSeeder extends Seeder
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
        $attributes = [
            [
                "product_attribute_code" => "attribute5276",
                "product_attribute_name" => "Variant",
                "input_type" => 1,
                "is_filterable" => 0,
                "is_required" => 1
            ],
            [
                "product_attribute_code" => "attribute7876",
                "product_attribute_name" => "Size",
                "input_type" => 1,
                "is_filterable" => 0,
                "is_required" => 1
            ],
        ];
        foreach ($attributes as $attribute) {
            Attribute::create($attribute);
        }
    }
}
