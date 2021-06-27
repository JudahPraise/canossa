<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->date('date_from');
            $table->string('time_from');
            $table->date('date_to');
            $table->string('time_to');
            $table->string('affected_employees');
            $table->string('announcement_title');
            $table->longText('announcement_description');
            $table->mediumText('attachment')->nullable();
            $table->mediumText('link')->nullable();
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
        Schema::dropIfExists('announcements');
    }
}
