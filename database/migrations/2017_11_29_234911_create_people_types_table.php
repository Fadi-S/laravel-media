<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->unique(); /* Singer, Pope */
            $table->string("slug")->unique();
            $table->softDeletes();
            $table->timestamps();
        });
    }

/*        Schema::create('person_type', function (Blueprint $table) {
            $table->integer('person_id');
            $table->integer("type_id");
            $table->primary(['person_id', 'type_id']);
        });
    }
*/
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people_types');
    }
}
