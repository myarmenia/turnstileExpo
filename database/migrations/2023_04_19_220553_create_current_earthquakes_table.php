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
        Schema::create('current_earthquakes', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_am');
            $table->string('title_ru');
            $table->string('banner')->nullable();
            $table->date('date');
            $table->time('time');
            $table->longText('description_en');
            $table->longText('description_am');
            $table->longText('description_ru');
            $table->string('status')->default('new');
            $table->string('magnitude');
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
        Schema::dropIfExists('current_earthquakes');
    }
};
