<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->unique(); /* ex: love, faith, kindness */
            $table->string("slug")->unique();
            $table->softDeletes();
            $table->timestamps();
        });
        
        Schema::create('media_topic', function (Blueprint $table) {
            $table->integer('topic_id');
            $table->integer('media_id');
            $table->primary(["topic_id", "media_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topics');
        Schema::dropIfExists('media_topic');
    }
}
