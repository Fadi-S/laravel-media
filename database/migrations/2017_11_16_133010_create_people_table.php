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
            $table->string("name")->unique();
            $table->string("slug")->unique();
            $table->text("photo")->nullable();
            $table->text("cover_photo")->nullable();
            $table->text("bio")->nullable();
            $table->date("birthday")->nullable();
            $table->date("passed_away")->nullable();
            $table->integer("created_by");
            $table->integer("edited_by")->nullable();
            $table->integer("person_type_id");
            $table->timestamps();
        });

        Schema::create('media_person', function (Blueprint $table) {
            $table->integer("media_id");
            $table->integer("person_id");
            $table->primary(["media_id", "person_id"]);
        });

        Schema::create("book_person", function(Blueprint $table) {
            $table->integer("book_id");
            $table->integer("person_id");
            $table->primary(['book_id', 'person_id']);
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
        Schema::dropIfExists('book_person');
    }
}
