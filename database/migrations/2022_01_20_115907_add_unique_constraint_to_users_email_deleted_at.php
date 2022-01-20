<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueConstraintToUsersEmailDeletedAt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //emailカラムとdeleted_atカラムの複合ユニーク制約を設定する
            $table->unique(['email', 'deleted_at'], 'users_email_deleted_at_unique');
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
            //emailカラムとdeleted_atカラムの複合ユニーク制約を解除する
            $table->dropUnique('users_email_deleted_at_unique');
        });
    }
}
