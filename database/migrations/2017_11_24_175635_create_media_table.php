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
            $table->integer("occasion_id"); /* chirstmas, easter */
            $table->text("path");
            $table->integer("location_id")->nullable(); /* ex: kenissa margerges sporting, el mor2osseya */
            $table->softDeletes();
            $table->timestamps();

            $table->foreign("file_type")->references("id")->on("file_types");
            $table->foreign("location_id")->references("id")->on("locations");
            $table->foreign("show_type")->references("id")->on("show_types");
            $table->foreign("occasion_id")->references("id")->on("occasions");
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
    }
}
