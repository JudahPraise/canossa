<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyBackgroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('spouse_surname');
            $table->string('spouse_firstname');
            $table->string('spouse_middlename');
            $table->string('spouse_occupation')->nullable();
            $table->string('spouse_employer_business_name')->nullable();
            $table->string('spouse_business_address')->nullable();
            $table->string('spouse_tel_no')->nullable();

            $table->string('father_surname');
            $table->string('father_firstname');
            $table->string('father_middlename');
            $table->string('father_occupation')->nullable();
            $table->string('father_employer_business_name')->nullable();
            $table->string('father_business_address')->nullable();
            $table->string('father_tel_no')->nullable();

            $table->string('mother_surname');
            $table->string('mother_firstname');
            $table->string('mother_middlename');
            $table->string('mother_occupation')->nullable();
            $table->string('mother_employer_business_name')->nullable();
            $table->string('mother_business_address')->nullable();
            $table->string('mother_tel_no')->nullable();
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
        Schema::dropIfExists('family_backgrounds');
    }
}
