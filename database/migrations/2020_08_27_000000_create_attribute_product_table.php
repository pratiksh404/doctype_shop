<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeProductTable extends Migration
{
    /**
     *
     *Create the table
     *
     *@return void
     *
     */
    public function up()
    {
        Schema::create('attribute_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('attribute_id');
            $table->timestamps();
        });
    }

    /**
     *
     *Drop the table
     *
     *@return void
     *
     */
    public function down()
    {
        Schema::drop('attribute_product');
    }
}
