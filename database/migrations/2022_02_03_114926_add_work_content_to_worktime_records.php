<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWorkContentToWorktimeRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('worktime_records', function (Blueprint $table) {
            //超勤理由を格納するカラムを作成する
            $table->string('work_content')->after('holiday_midnight_end');
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
            // カラムを削除する
            $table->dropColumn('work_content');
        });
    }
}
