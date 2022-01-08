<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTeamIdToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //passwordカラムのすぐ後ろに、team_idカラムを追加する
            $table->unsignedBigInteger('team_id')->after('password');
            // 外部キー制約の設定
            $table->foreign('team_id')        // foreignメソッドでteam_idを外部キーに設定する。
                ->references('id')            // referencesメソッドで、従テーブルのteam_idと紐付いている主テーブルのidを指定する。
                ->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // 外部キー付きのカラムを削除するには、まず必ず外部キー制約を外す。
            $table->dropForeign(['team_id']);
            // 続いてカラムを削除する。
            $table->dropColumn('team_id');
        });
    }
}
