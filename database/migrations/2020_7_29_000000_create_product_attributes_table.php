<?php

namespace doctype_admin\Shop;

use Illuminate\Database\Migrations\Migration;

class CreateProductAttributesTable extends Migration
{
    /**
     *
     *Create Table
     *
     *@return void
     *
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_attribute_code')->unique();
            $table->string('product_attribute_name');
            $table->integer('input_type');
            $table->boolean('is_filterable')->default(0);
            $table->boolean('is_required')->default(0);
            $table->timestamps();
        });
    }
}
