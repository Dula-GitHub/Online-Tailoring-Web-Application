<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('user_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('material_id')->references('id')->on('materials');
            $table->unsignedBigInteger('material_id');
            $table->string('amount_of_cloth');
            $table->date('requested_date');
            $table->decimal('cost', 9,2);
            $table->decimal('neck_girth' ,9,2)->nullable();
            $table->decimal('chest_girth' ,9,2)->nullable();
            $table->decimal('waist_girth' ,9,2)->nullable();
            $table->decimal('hip_girth' ,9,2)->nullable();
            $table->decimal('bicep_girth' ,9,2)->nullable();
            $table->decimal('first_forearm_girth' ,9,2)->nullable();
            $table->decimal('wrist_girth' ,9,2)->nullable();
            $table->decimal('shoulder_slope_length' ,9,2)->nullable();
            $table->decimal('sleeve_length' ,9,2)->nullable();
            $table->decimal('breast_height' ,9,2)->nullable();
            $table->decimal('shirt_length' ,9,2)->nullable();
            $table->decimal('length_to_the_hip' ,9,2)->nullable();
            $table->decimal('shoulder_length' ,9,2)->nullable();
            $table->decimal('waist_circumference' ,9,2)->nullable();
            $table->decimal('upper_hip_circumference' ,9,2)->nullable();
            $table->decimal('lower_hip_circumference' ,9,2)->nullable();
            $table->decimal('waist_to_lower_hip' ,9,2)->nullable();
            $table->decimal('skirt_length' ,9,2)->nullable();
            $table->decimal('shoulder_to_waist' ,9,2)->nullable();
            $table->decimal('upper_bust' ,9,2)->nullable();
            $table->decimal('bust' ,9,2)->nullable();
            $table->decimal('under_bust' ,9,2)->nullable();
            $table->decimal('shoulder_to_apex' ,9,2)->nullable();
            $table->decimal('upper_arm' ,9,2)->nullable();
            $table->decimal('apex_to_apex' ,9,2)->nullable();
            $table->decimal('sleeve_circumference' ,9,2)->nullable();
            $table->decimal('bust_circumference' ,9,2)->nullable();
            $table->decimal('bodice_length' ,9,2)->nullable();
            $table->decimal('back_width' ,9,2)->nullable();
            $table->decimal('armpit_girth' ,9,2)->nullable();
            $table->decimal('hip_circumference' ,9,2)->nullable();
            $table->decimal('neckline_circumference' ,9,2)->nullable();
            $table->decimal('armhole_circumference' ,9,2)->nullable();
            $table->decimal('shoulder_width' ,9,2)->nullable();
            $table->decimal('bust_height' ,9,2)->nullable();
            $table->decimal('tunic_front_length' ,9,2)->nullable();
            $table->decimal('tunic_back_length' ,9,2)->nullable();
            $table->decimal('neckline_drop' ,9,2)->nullable();
            $table->decimal('collar' ,9,2)->nullable();
            $table->decimal('chest' ,9,2)->nullable();
            $table->decimal('shirt_waist' ,9,2)->nullable();
            $table->decimal('hip' ,9,2)->nullable();
            $table->decimal('bicep' ,9,2)->nullable();
            $table->decimal('cuff' ,9,2)->nullable();
            $table->decimal('yoke' ,9,2)->nullable();
            $table->decimal('back_length' ,9,2)->nullable();
            $table->decimal('waist' ,9,2)->nullable();
            $table->decimal('pants_out_seam' ,9,2)->nullable();
            $table->decimal('inseam' ,9,2)->nullable();
            $table->decimal('thigh' ,9,2)->nullable();
            $table->decimal('knee' ,9,2)->nullable();
            $table->decimal('bottom' ,9,2)->nullable();
            $table->decimal('crotch' ,9,2)->nullable();
            $table->decimal('jacket_waist' ,9,2)->nullable();
            $table->decimal('front_length' ,9,2)->nullable();
            $table->decimal('shoulder' ,9,2)->nullable();
            $table->decimal('around_the_neck' ,9,2)->nullable();
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
        Schema::dropIfExists('orders');
    }
}


