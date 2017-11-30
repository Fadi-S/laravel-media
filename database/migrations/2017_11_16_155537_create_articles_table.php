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
            $table->integer("creator_id");
            $table->integer("editor_id");
            $table->string("title");
            $table->string("slug")->unique();
            $table->text("body");
            $table->timestamps();

            $table->foreign("creator_id")->references("id")->on("admins");
            $table->foreign("editor_id")->references("id")->on("admins");
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
