<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableImagesTours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_tours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('img', 255);
            $table->string('alt', 255);
            $table->string('title', 255);
            $table->tinyInteger('imagePriority')->default(0);
            $table->integer('tours_id', 0, 1);
            $table->foreign('tours_id')
                ->references('id')->on('tours')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('images_tours');
    }
}
