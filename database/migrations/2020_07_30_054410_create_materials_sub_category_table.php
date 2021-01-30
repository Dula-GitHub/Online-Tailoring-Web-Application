<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsSubCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials_sub_category', function (Blueprint $table) {
            $table->id();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
            $table->unsignedBigInteger('sub_category_id');
            $table->foreign('material_id')->references('id')->on('materials');
            $table->unsignedBigInteger('material_id');
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
        Schema::dropIfExists('materials_sub_category');
    }
}
