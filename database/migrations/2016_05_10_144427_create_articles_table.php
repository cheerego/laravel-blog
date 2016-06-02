<?php

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
            $table->text('content')->nullab;
            $table->text('html');
            $table->tinyInteger('category_id',null,true);
            $table->string('author');
            $table->timestamp('published_at')->nullable;
            $table->timestamp('deleted_at')->nullable;
            $table->timestamps();


            $table->foreign('category_id')->references('id')->on('categorys')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
