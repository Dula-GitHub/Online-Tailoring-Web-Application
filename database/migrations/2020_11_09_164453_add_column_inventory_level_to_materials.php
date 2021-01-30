<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInventoryLevelToMaterials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->foreign('inventory_level')->references('id')->on('inventory_level');
            $table->unsignedBigInteger('inventory_level')->after('unit_price')->nullable();
            $table->string('stock')->after('inventory_level')->default(0.00);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('materials', function (Blueprint $table) {
            //
        });
    }
}
