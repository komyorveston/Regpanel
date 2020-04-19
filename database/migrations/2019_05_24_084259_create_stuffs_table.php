<?php
 
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStuffsTable extends Migration
{
    /****
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stuffs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->tinyInteger('department_id')->unsigned();
            $table->tinyInteger('organization_id')->unsigned();
            $table->tinyInteger('position_id')->unsigned();
            $table->string('name',255);
            $table->string('surname',255)->default(NULL)->nullable();
            $table->string('fathersname',255)->default(NULL)->nullable();
            $table->string('email',255)->default(NULL)->nullable();
            $table->string('phone',255)->default(NULL)->nullable();
            $table->text('description',255)->default(NULL)->nullable();
            $table->enum('status',['0','1'])->default(1);
            $table->string('img',255)->nullable();
            $table->unsignedBigInteger('created_user');
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
        Schema::dropIfExists('stuffs');
    }
}
