<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFathersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fathers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('family_id');
            $table->foreign('family_id')->references('id')->on('families');
            $table->string('surname');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('occupation')->nullable();
            $table->string('employer_business_name')->nullable();
            $table->string('business_address')->nullable();
            $table->string('tel_no')->nullable();
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
        Schema::dropIfExists('fathers');
    }
}
