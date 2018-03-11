<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("email")->unique();
            $table->string("password");
            $table->timestamp("last_activity")->nullable(); /* Last activity time to check if user is online */
            $table->timestamp("last_login")->nullable(); /* To check if user uses the site constantly */
            $table->rememberToken(); /* bet5ali el user yefdal logged in */
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
