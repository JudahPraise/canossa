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
            $table->string('middle_name');
            $table->string('surname');
            $table->date('date_of_birth');
            $table->string('sex');
            $table->string('citizenship');
            $table->string('civil_status');
            $table->float('height', 5, 2);
            $table->float('weight', 5, 2);
            $table->float('bmi', 5, 2)->nullable();
            $table->string('blood_type');
            $table->mediumText('address');
            $table->string('zip_code');
            $table->string('tel_number');
            $table->string('cell_number');
            $table->string('prc');
            $table->string('gsis');
            $table->string('sss');
            $table->string('pag_ibig');
            $table->string('driver_license');
            $table->string('phil_health');
            $table->mediumText('email_address');
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
