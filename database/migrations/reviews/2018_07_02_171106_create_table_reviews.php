<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comment');
            $table->integer('user_id', 0, 1);
            $table->foreign('user_id')
                ->references('id')->on('user')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('tour_id', 0, 1);
            $table->foreign('tour_id')
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
        Schema::dropIfExists('reviews');
    }
}
