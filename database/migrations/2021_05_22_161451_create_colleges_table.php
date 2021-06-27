<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colleges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('educ_id');
            $table->foreign('educ_id')->references('id')->on('educational_backgrounds');
            $table->longText('name_of_school');
            $table->string('level')->default('college');
            // $table->date('period_date_from');
            // $table->date('period_date_to');
            $table->string('course_degree');
            $table->string('level_units_earned')->nullable();
            $table->string('sy_graduated')->nullable();
            $table->string('academic_reward')->nullable();
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
        Schema::dropIfExists('colleges');
    }
}
