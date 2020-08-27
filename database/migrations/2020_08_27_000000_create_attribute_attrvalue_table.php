<?php

use Illuminate\Database\Migrations\Migration;

class CreateAttributeAttrvalueTable extends Migration
{
    /**
     *
     *Make Table
     *
     *@return void
     *
     */
    public function up()
    {
        Schema::create('attribute_attrvalue', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('attribute_id');
            $table->unsignedBigInteger('attrvalue_id');
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
        Schema::drop('attribute_attrvalue');
    }
}
