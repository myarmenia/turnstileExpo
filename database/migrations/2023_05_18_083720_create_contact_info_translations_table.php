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
        Schema::create('contact_info_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('contact_info_id')->unsigned();
            $table->foreign('contact_info_id')->references('id')->on('contact_infos')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('language_id')->unsigned();
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade')->onUpdate('cascade');
            $table->string('address');
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
        Schema::dropIfExists('contact_info_translations');
    }
};
