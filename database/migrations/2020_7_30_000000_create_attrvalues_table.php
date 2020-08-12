<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttrvaluesTable extends Migration
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
        Schema::create('attrvalues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('attribute_id');
            $table->foreign('attribute_id')->references('id')->on('attributes');
            $table->text('value');
            $table->text('price');
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
        Schema::drop('attrvalues');
    }
}
