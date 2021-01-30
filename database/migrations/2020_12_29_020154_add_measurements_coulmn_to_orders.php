<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMeasurementsCoulmnToOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('measurements')->after('design_image');
            $table->dropColumn('neck_girth');
            $table->dropColumn('chest_girth');
            $table->dropColumn('waist_girth');
            $table->dropColumn('hip_girth');
            $table->dropColumn('bicep_girth');
            $table->dropColumn('first_forearm_girth');
            $table->dropColumn('wrist_girth');
            $table->dropColumn('shoulder_slope_length');
            $table->dropColumn('sleeve_length');
            $table->dropColumn('breast_height');
            $table->dropColumn('shirt_length');
            $table->dropColumn('length_to_the_hip');
            $table->dropColumn('shoulder_length');
            $table->dropColumn('waist_circumference');
            $table->dropColumn('upper_hip_circumference');
            $table->dropColumn('lower_hip_circumference');
            $table->dropColumn('waist_to_lower_hip');
            $table->dropColumn('skirt_length');
            $table->dropColumn('shoulder_to_waist');
            $table->dropColumn('upper_bust');
            $table->dropColumn('bust');
            $table->dropColumn('under_bust');
            $table->dropColumn('shoulder_to_apex');
            $table->dropColumn('upper_arm');
            $table->dropColumn('apex_to_apex');
            $table->dropColumn('sleeve_circumference');
            $table->dropColumn('bust_circumference');
            $table->dropColumn('bodice_length');
            $table->dropColumn('back_width');
            $table->dropColumn('armpit_girth');
            $table->dropColumn('hip_circumference');
            $table->dropColumn('neckline_circumference');
            $table->dropColumn('armhole_circumference');
            $table->dropColumn('shoulder_width');
            $table->dropColumn('bust_height');
            $table->dropColumn('tunic_front_length');
            $table->dropColumn('tunic_back_length');
            $table->dropColumn('neckline_drop');
            $table->dropColumn('collar');
            $table->dropColumn('chest');
            $table->dropColumn('shirt_waist');
            $table->dropColumn('hip');
            $table->dropColumn('bicep');
            $table->dropColumn('cuff');
            $table->dropColumn('yoke');
            $table->dropColumn('back_length');
            $table->dropColumn('waist');
            $table->dropColumn('pants_out_seam');
            $table->dropColumn('inseam');
            $table->dropColumn('thigh');
            $table->dropColumn('knee');
            $table->dropColumn('bottom');
            $table->dropColumn('crotch');
            $table->dropColumn('jacket_waist');
            $table->dropColumn('front_length');
            $table->dropColumn('shoulder');
            $table->dropColumn('around_the_neck');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
