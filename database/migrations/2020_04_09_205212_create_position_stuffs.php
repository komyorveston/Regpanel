<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionStuffs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position_stuffs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('pos_id');
            $table->bigInteger('stuff_id');
            $table->primary(['pos_id', 'stuff_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('position_stuffs');
    }
}
