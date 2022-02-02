<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorktimeRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worktime_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('record_date');
            $table->time('weekday_morning_start');
            $table->time('weekday_morning_end');
            $table->time('weekday_normal_start');
            $table->time('weekday_normal_end');
            $table->time('weekday_midnight_start');
            $table->time('weekday_midnight_end');
            $table->time('holiday_start');
            $table->time('holiday_end');
            $table->time('holiday_midnight_start');
            $table->time('holiday_midnight_end');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('worktime_records');
    }
}
