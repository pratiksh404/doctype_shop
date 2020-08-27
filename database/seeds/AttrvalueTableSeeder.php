<?php

use doctype_admin\Shop\Models\Attribute;
use Illuminate\Database\Seeder;

class AttrValueTableSeeder extends Seeder
{
    /**
     *
     *Create Seeder
     *
     *@return void
     *
     */
    public function run()
    {
        $attribute_one = Attribute::find(1);
        $attribute_one->attrvalues()->create(['value' => "128GB"]);
        $attribute_one->attrvalues()->create(['value' => "256GB"]);

        $attribute_two = Attribute::find(2);
        $attribute_two->attrvalues()->create(['value' => "XL"]);
        $attribute_two->attrvalues()->create(['value' => "L"]);
        $attribute_two->attrvalues()->create(['value' => "M"]);
    }
}
