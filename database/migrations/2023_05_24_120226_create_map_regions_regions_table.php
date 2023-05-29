<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_regions_regions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('map_region_id')->unsigned();
            $table->foreign('map_region_id')->references('id')->on('map_regions')->onDelete('cascade');
            $table->bigInteger('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
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
        Schema::dropIfExists('map_regions_regions');
    }
};
