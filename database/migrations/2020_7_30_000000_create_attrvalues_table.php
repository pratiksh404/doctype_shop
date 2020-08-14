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
            $table->text('value');
            $table->unsignedBigInteger('attrvalueable_id');
            $table->string('attrvalueable_type');
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
