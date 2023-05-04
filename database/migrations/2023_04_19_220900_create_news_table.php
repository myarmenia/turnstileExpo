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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_am');
            $table->string('title_ru');
            $table->longText('description_en');
            $table->longText('description_am');
            $table->longText('description_ru');
            $table->string('image');
            $table->string('button_text_en')->nullable();
            $table->string('button_text_am')->nullable();
            $table->string('button_text_ru')->nullable();
            $table->string('button_link')->nullable();
            $table->string('status')->default('new');
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
        Schema::dropIfExists('news');
    }
};
