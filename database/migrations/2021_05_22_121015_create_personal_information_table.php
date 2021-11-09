<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('surname');
            $table->string('name_extension')->nullable();
            $table->date('date_of_birth');
            $table->string('sex');
            $table->string('citizenship');
            $table->string('civil_status');
            $table->mediumText('address');
            $table->string('zip_code');
            $table->string('tel_number')->nullable();
            $table->string('cell_number')->nullable();
            $table->string('prc')->nullable();
            $table->string('gsis')->nullable();
            $table->string('sss')->nullable();
            $table->string('pag_ibig')->nullable();
            $table->string('driver_license')->nullable();
            $table->string('phil_health')->nullable();
            $table->mediumText('email_address')->nullable();
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
        Schema::dropIfExists('personal_information');
    }
}
