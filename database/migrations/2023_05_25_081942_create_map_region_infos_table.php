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
        Schema::create('map_region_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('map_region_id')->unsigned();
            $table->foreign('map_region_id')->references('id')->on('regions')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('editor_id')->unsigned();
            $table->foreign('editor_id')->references('id')->on('users');
            $table->string('image_path');
            $table->string('schema_path');

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
        Schema::dropIfExists('map_region_infos');
    }
};
