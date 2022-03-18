<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('mname')->nullable();
            $table->string('extname')->nullable();
            $table->string('sex');
            $table->date('dob');
            $table->string('employee_id', 32);
            $table->string('password');
            $table->string('role');
            $table->string('department')->nullable();
            $table->string('category');
            $table->string('qr_token');
            $table->mediumText('image')->nullable();
            $table->string('status')->default('active');
            $table->string('labtest')->nullable();
            $table->string('full_name')->nullable();
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
        Schema::dropIfExists('users');
    }
}
