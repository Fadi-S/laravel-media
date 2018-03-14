<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name"); /* ex: Pope Shenouda the third, Ibrahim Ayad */
            $table->string("slug")->unique();
            $table->text("photo")->nullable();
            $table->text("cover_photo")->nullable();
            $table->text("bio")->nullable(); /* Biography */
            $table->date("birthday")->nullable();
            $table->date("passed_away")->nullable(); /* death day (law etnaya7) */
            $table->softDeletes();
            $table->integer("person_type_id"); /* ex: Singer, Choir, Pope */
            $table->timestamps();
        });

        Schema::create('media_person', function (Blueprint $table) {
            $table->integer("media_id");
            $table->integer("person_id");
            $table->integer("type");
            $table->primary(["media_id", "person_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
        Schema::dropIfExists('media_person');
    }
}
