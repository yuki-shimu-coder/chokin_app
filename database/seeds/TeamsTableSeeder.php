<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 部署配列
        $data = array(
            array(
                'team_name' => '総務課', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ),
            array(
                'team_name' => '企画商工課', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ),
            array(
                'team_name' => '農林課', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ),
            array(
                'team_name' => '建設課', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ),
            array(
                'team_name' => '住民課', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ),
            array(
                'team_name' => '福祉子育て支援課', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ),
            array(
                'team_name' => 'トマム支所', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ),
            array(
                'team_name' => '占冠保育所', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ),
            array(
                'team_name' => 'トマム保育所', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ),
            array(
                'team_name' => '会計室', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ),
            array(
                'team_name' => '教育委員会', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ),
            array(
                'team_name' => '議会', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ),
        );
        //teamsテーブルにデータを登録する
        DB::table('teams')->insert($data);
    }
}
