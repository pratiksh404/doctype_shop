<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
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
        Schema::create('brands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('brand_name');
            $table->string('brand_slug')->unique();
            $table->string('brand_image')->nullable();
            $table->text('brand_description')->nullable();
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
        Schema::drop('brands');
    }
}
