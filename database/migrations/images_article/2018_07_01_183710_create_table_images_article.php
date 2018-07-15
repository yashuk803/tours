<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableImagesArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_article', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('img', 255);
            $table->string('alt', 255);
            $table->string('title', 255);
            $table->tinyInteger('imagePriority')->default(0);
            $table->integer('article_id', 0, 1);
            $table->foreign('article_id')
                ->references('id')->on('articles')
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
        Schema::dropIfExists('images_article');
    }
}
