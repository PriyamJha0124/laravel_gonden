<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->unsigned();
            $table->text('name');
            $table->longText('description')->nullable();
            $table->text('picture')->nullable();
            $table->integer('rating')->nullable();
            $table->decimal('price')->nullable();
            $table->decimal('discount')->nullable();
            $table->text('location')->nullable();
            $table->integer('city_id')->unsigned();
            $table->text('latitude')->nullable();
            $table->text('longitude')->nullable();
            $table->text('contact')->nullable();
            $table->time('time_from')->nullable();
            $table->time('time_to')->nullable();
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
        Schema::dropIfExists('shops');
    }
}
