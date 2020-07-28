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
            $table->string('attribute');
            $table->string('attribute_values');
            $table->timestamps();
        });
    }
}
