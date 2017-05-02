<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('content');
            $table->string('slug');
            $table->string('imgThumb')->nullable();
            $table->mediumText('description');
            $table->integer('user_id')->unsigned();
            $table->integer('cate_id')->unsigned();
            $table->dateTime('time_public')->nullable();
            $table->tinyInteger('hot')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->integer('view')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
