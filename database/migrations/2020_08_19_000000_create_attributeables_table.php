<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateAttributeablesTable extends Migration
{
    /**
     *
     *Create Many to Many  Attribute Table
     *
     *@return void
     *
     */

    public function up()
    {
        Schema::create('attributeables', function (Blueprint $table) {
            $table->unsignedBigInteger('attribute_id');
            $table->unsignedBigInteger('attributeable_id');
            $table->string('attributeable_type');
            $table->timestamps();
        });
    }

    /**
     *
     *Drop Many To Many Attribute Table
     *
     *@return return_type
     *
     */

    public function down()
    {
        Schema::drop('attributeables');
    }
}
