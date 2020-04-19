<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentStuffs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_stuffs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('dep_id');
            $table->bigInteger('stuff_id');
            $table->primary(['dep_id', 'stuff_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_stuffs');
    }
}
