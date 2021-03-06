<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategoriesTable extends Migration
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
        Schema::create('product_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category_name');
            $table->string('category_slug')->unique();
            $table->text('category_description')->nullable();
            $table->string('category_icon')->nullable();
            $table->string('category_image')->nullable();
            $table->boolean('category_featured')->default(0);
            $table->timestamps();
        });
    }

    /**
     *
     *Drop Table
     *
     *@return void
     *
     */

    public function down()
    {
        Schema::drop('product_categories');
    }
}
