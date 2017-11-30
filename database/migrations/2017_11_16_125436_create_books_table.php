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
            $table->string("slug")->unique();
            $table->integer("pages")->nullable();
            $table->date("published_at")->nullable();
            $table->integer("publisher_id")->nullable();
            $table->text("path");
            $table->integer("created_by");
            $table->integer("edited_by")->nullable();
            $table->timestamps();

            $table->foreign("created_by")->references("id")->on("admins");
            $table->foreign("edited_by")->references("id")->on("admins");
            $table->foreign("publisher_id")->references("id")->on("publishers");
        });

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
