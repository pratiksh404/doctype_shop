<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesTable extends Migration
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
        Schema::create('attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_attribute_code')->unique();
            $table->string('product_attribute_name');
            $table->integer('input_type');
            $table->boolean('is_filterable')->default(0);
            $table->boolean('is_required')->default(0);
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
        Schema::drop('attributes');
    }
}
