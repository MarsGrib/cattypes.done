<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategoriesProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_properties', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->bigInteger('property_id');///->default("0");
           
            $table->tinyInteger('on')->default("1"); 
            $table->tinyInteger('hidden')->default("0"); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_properties');
    }
}
