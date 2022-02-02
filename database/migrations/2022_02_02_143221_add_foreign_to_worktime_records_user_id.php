<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToWorktimeRecordsUserId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('worktime_records', function (Blueprint $table) {
            //外部キー制約の設定
            $table->foreign('user_id')        // foreignメソッドでuser_idを外部キーに設定する。
                ->references('id')            // referencesメソッドで、従テーブルのuser_idと紐付いている主テーブルのidを指定する。
                ->on('users');
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
            // 外部キー付きのカラムを削除するには、まず必ず外部キー制約を外す。
            $table->dropForeign(['user_id']);
        });
    }
}
