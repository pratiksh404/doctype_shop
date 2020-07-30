<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductAttributeValuesTable extends Migration
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
        Schema::create('product_attribute_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('product_attribute_id');
            $table->foreign('product_attribute_id')->references('id')->on('product_attributes');
            $table->text('value');
            $table->text('price');
            $table->timestamps();
        });
    }
}
