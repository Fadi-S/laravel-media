<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->unique();
            $table->string("slug")->unique();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('book_classification', function (Blueprint $table) {
            $table->integer("book_id");
            $table->integer('classification_id');
            $table->primary(['book_id', 'classification_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classifications');
        Schema::dropIfExists('book_classification');
    }
}
