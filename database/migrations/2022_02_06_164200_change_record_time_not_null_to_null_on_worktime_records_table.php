<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeRecordTimeNotNullToNullOnWorktimeRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('worktime_records', function (Blueprint $table) {
            $table->time('weekday_morning_start')->nullable()->change();
            $table->time('weekday_morning_end')->nullable()->change();
            $table->time('weekday_normal_start')->nullable()->change();
            $table->time('weekday_normal_end')->nullable()->change();
            $table->time('weekday_midnight_start')->nullable()->change();
            $table->time('weekday_midnight_end')->nullable()->change();
            $table->time('holiday_start')->nullable()->change();
            $table->time('holiday_end')->nullable()->change();
            $table->time('holiday_midnight_start')->nullable()->change();
            $table->time('holiday_midnight_end')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('worktime_records', function (Blueprint $table) {
            $table->time('weekday_morning_start')->nullable(false)->change();
            $table->time('weekday_morning_end')->nullable(false)->change();
            $table->time('weekday_normal_start')->nullable(false)->change();
            $table->time('weekday_normal_end')->nullable(false)->change();
            $table->time('weekday_midnight_start')->nullable(false)->change();
            $table->time('weekday_midnight_end')->nullable(false)->change();
            $table->time('holiday_start')->nullable(false)->change();
            $table->time('holiday_end')->nullable(false)->change();
            $table->time('holiday_midnight_start')->nullable(false)->change();
            $table->time('holiday_midnight_end')->nullable(false)->change();
        });
    }
}
