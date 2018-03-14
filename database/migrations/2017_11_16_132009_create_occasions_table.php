<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOccasionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occasions', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->unique(); /* ex: chirstmas, easter */
            $table->string("slug")->unique();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('media_occasion', function(Blueprint $table) {
            $table->integer("occasion_id");
            $table->integer("media_id");
            $table->primary(["media_id", "occasion_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('occasions');
        Schema::dropIfExists('media_occasion');
    }
}
