<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("slug")->unique();
            $table->integer("file_type"); /* Video, Sound */
            $table->integer("show_type"); /* Hymns, Taranim, Preachs, Videos */
            $table->integer("occasion_id")->nullable(); /* chirstmas, easter */
            $table->text("path");
            $table->text("image")->nullable();
            $table->string("alt")->nullable();
            $table->integer("pages")->nullable();
            $table->date("published_at")->nullable();
            $table->integer("publisher_id")->nullable();
            $table->integer("lang_id")->default(1);
            $table->integer("location_id")->nullable(); /* ex: kenissa margerges sporting, el mor2osseya */
            $table->softDeletes();
            $table->timestamps();

            $table->foreign("publisher_id")->references("id")->on("publishers");
            $table->foreign("lang_id")->references("id")->on("languages");
            $table->foreign("file_type")->references("id")->on("file_types");
            $table->foreign("location_id")->references("id")->on("locations");
            $table->foreign("show_type")->references("id")->on("show_types");
            $table->foreign("occasion_id")->references("id")->on("occasions");
        });

        Schema::create('index_media', function (Blueprint $table) {
            $table->integer("media_id");
            $table->integer("index_id");
            $table->primary(["media_id", "index_id"]);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
        Schema::dropIfExists('book_index');
    }
}
