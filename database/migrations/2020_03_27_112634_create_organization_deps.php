<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationDeps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_deps', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('org_id');
            $table->bigInteger('dep_id');
            $table->primary(['org_id', 'dep_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organization_deps');
    }
}
