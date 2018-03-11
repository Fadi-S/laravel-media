<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_role', function (Blueprint $table) {
            $table->integer('perm_id');
            $table->integer('role_id');
            $table->primary(['perm_id', 'role_id']);
        });

        Schema::create('admin_permission', function (Blueprint $table) {
            $table->integer('perm_id');
            $table->integer('admin_id');
            $table->primary(['admin_id', 'perm_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_role');
        Schema::dropIfExists('admin_permission');
    }
}
