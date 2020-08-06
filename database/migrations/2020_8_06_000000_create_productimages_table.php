<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductimageTable extends Migration
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
        Schema::create('productimages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_image');
            $table->integer('product_image_type');
            $table->unsignedBigInteger('productimageable_id');
            $table->string('productimageable_type');
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
        Schema::drop('productimages');
    }
}
