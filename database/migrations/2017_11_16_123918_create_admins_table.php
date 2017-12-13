<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string("display_name"); /* Name displayed to admins */
            $table->string("name")->unique(); /* Unique name */
            $table->string("email")->unique(); /* Email used to login with */
            $table->string("phone")->unique(); /* Used to login */
            $table->text("password");
            $table->text("picture")->nullable(); /* profile picture */
            $table->timestamp("last_login")->nullable(); /* zay el users */
            $table->timestamp("last_activity")->nullable(); /* zay el users */
            $table->rememberToken(); /* 7aga bet5ali el user yefdal logged in */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
