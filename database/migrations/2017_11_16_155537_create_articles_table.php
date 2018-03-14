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
            $table->integer("writer_id")->nullable();
            $table->string("title");
            $table->string("slug")->unique();
            $table->text("body");
            $table->softDeletes();
            $table->timestamps();

            $table->foreign("writer_id")->references("id")->on("people");
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
