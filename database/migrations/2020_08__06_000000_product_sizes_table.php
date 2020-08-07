<?php

namespace doctype_admin\Shop;

use Illuminate\Database\Migrations\Migration;

class CreateProductSizesTable extends Migration
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
        Schema::create('sizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('size');
            $table->timestamps();
        });
    }
}
