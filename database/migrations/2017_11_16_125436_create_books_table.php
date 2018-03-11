<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->unique();
            $table->string("slug")->unique(); /* ex: example.com/book-name */
            $table->integer("pages")->nullable();
            $table->date("published_at")->nullable();
            $table->integer("publisher_id")->nullable();
            $table->integer("lang_id")->default(1);
            $table->text("path"); /* pdf path */
            $table->softDeletes();
            $table->timestamps();

            /* RElations between tables */
            $table->foreign("publisher_id")->references("id")->on("publishers");
            $table->foreign("lang_id")->references("id")->on("languages");
        });

        /* Relation between book table o index table */
        Schema::create('book_index', function (Blueprint $table) {
            $table->integer("book_id");
            $table->integer("index_id");
            $table->primary(["book_id", "index_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
        Schema::dropIfExists('book_index');
    }
}
