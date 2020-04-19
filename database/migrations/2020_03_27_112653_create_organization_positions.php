<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationPositions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_positions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('org_id');
            $table->bigInteger('pos_id');
            $table->primary(['org_id', 'pos_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organization_positions');
    }
}
