<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoryMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_category_measurements', function (Blueprint $table) {
            $table->id();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
            $table->unsignedBigInteger('sub_category_id');
            $table->foreign('measurement_id')->references('id')->on('measurements');
            $table->unsignedBigInteger('measurement_id');
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
        Schema::dropIfExists('sub_category_measurements');
    }
}
