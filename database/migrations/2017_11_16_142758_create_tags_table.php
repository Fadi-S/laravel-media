<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("creator_id");
            $table->integer("editor_id");
            $table->string("name")->unique(); /* ex: god, church */
            $table->timestamps();

            $table->foreign("creator_id")->references("id")->on("admins");
            $table->foreign("editor_id")->references("id")->on("admins");
        });

        Schema::create('tag_tagged', function (Blueprint $table) {
            $table->integer('tag_id');
            $table->integer("tagged_id");
            $table->primary(['tag_id', 'tagged_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('tag_tagged');
    }
}
