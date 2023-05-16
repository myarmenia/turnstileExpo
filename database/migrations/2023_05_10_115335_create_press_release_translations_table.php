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
        Schema::create('press_release_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('press_release_id')->unsigned();
            $table->foreign('press_release_id')->references('id')->on('press_releases')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('language_id')->unsigned();
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title');
            $table->longText('description');
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
        Schema::dropIfExists('press_release_translations');
    }
};
