<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('schedule_title')->nullable();
            $table->string('schedule_description')->nullable();
            $table->string('schedule_month')->nullable();
            $table->string('schedule_week')->nullable();
            $table->string('schedule_day')->nullable();
            $table->string('schedule_date')->nullable();
            $table->string('schedule_start_time')->nullable();
            $table->string('schedule_end_time')->nullable();
            $table->string('username')->nullable();
            $table->integer('status')->default(0);
            $table->string('color')->nullable();

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
        Schema::dropIfExists('schedules');
    }
}
