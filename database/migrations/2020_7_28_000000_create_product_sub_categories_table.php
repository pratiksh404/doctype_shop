<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSubCategoriesTable extends Migration
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
        Schema::create('product_sub_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_category_id');
            $table->string('sub_category_name');
            $table->string('sub_category_slug')->unique();
            $table->text('sub_category_description')->nullable();
            $table->string('sub_category_icon')->nullable();
            $table->string('sub_category_image')->nullable();
            $table->boolean('sub_category_featured')->default(0);
            $table->boolean('sub_category_status')->default(1);
            $table->timestamps();

            $table->foreign('product_category_id')->references('id')->on('product_categories');
        });
    }
}
