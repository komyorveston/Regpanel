<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /***
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('title',255);
            $table->tinyInteger('parent_id')->unsigned()->default(0);
            $table->tinyInteger('organization_id')->unsigned();
            $table->string('description',255)->nullable();
            $table->string('img',255)->nullable();
            $table->unsignedBigInteger('created_user');
            $table->enum('status',['0','1'])->default(1);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
