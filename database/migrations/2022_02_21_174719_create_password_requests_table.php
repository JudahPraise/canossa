<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('employee_id', 32)->references('employee_id')->on('users');
            $table->string('admin_id', 32)->references('admin_id')->on('admins');
            $table->date('dob');
            $table->string('category');
            $table->string('status');
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
        Schema::dropIfExists('password_requests');
    }
}
