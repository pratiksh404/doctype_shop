<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_code')->unique();
            $table->string('product_name');
            $table->string('product_slug')->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_category_id');
            $table->unsignedBigInteger('product_sub_category_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('product_video')->nullable();
            $table->string('product_excerpt');
            $table->text('product_description')->nullable();
            $table->string('product_unit_price');
            $table->string('product_cost_price');
            $table->boolean('product_featured')->default(0);
            $table->boolean('product_published')->default(1);
            $table->string('product_stock')->default(0);
            $table->string('product_meta_name')->nullable();
            $table->text('product_meta_description')->nullable();
            $table->json('product_meta_keywords')->nullable();
            $table->timestamps();
        });
    }
}
