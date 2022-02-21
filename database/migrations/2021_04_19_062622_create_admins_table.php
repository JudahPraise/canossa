<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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

            $table->id();
            $table->string('name');
            $table->string('employee_id', 32);
            $table->string('admin_id', 32);
            $table->string('password');
            $table->string('user_id')->nullable();
            $table->string('dep_pos');
            $table->string('desc_id');
            $table->mediumText('image')->nullable();
            $table->rememberToken();
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
