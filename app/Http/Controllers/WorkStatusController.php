<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\WorktimeRecord;
use App\Http\Requests\WorkTimeRecordPost;



class WorkStatusController extends Controller
{
    // ログインユーザーの超勤状況を取得し、一覧表示する
    public function show()
    {
        // ログインユーザー名を取得する
        $user = Auth::user();
        $user_name = $user->name;

        //超勤状況を取得するために、モデルを用意
        // 申請日が最新のものから順に取得する（降順）
        $work_status = Auth::user()->worktime_records()->orderBy('record_date', 'asc')->get();

        // 時差計算関数
        function diffTime($record_date, $start_time, $end_time)
        {
            // カーボンオブジェクトを使用して、時差を計算する
            // カーボンにより開始時刻を新たに定義
            $start_time_carbon = new Carbon($record_date . $start_time);

            // カーボンにより終了時刻を新たに定義
            $end_time_carbon = new Carbon($record_date . $end_time);

            // 開始時間が終了時間より大きい場合　…　つまり日をまたいだ場合
            if ($start_time > $end_time) {
                // 終了時刻の日付を１日加算する
                $end_time_carbon->addDay();
            }

            // 分単位の時間差を算出する
            $diff_minute_carbon = $start_time_carbon->diffInMinutes($end_time_carbon);

            // 算出した値を返す

            return $diff_minute_carbon;
            // $total += $diff_minute_carbon;
        }



        // 取得した情報から超勤時間を算出する
        foreach ($work_status as $key => $value) {
            // 申請日
            $record_date = $value['record_date'];

            // ======================================================
            // 平日早朝
            // ======================================================
            // 平日早朝　開始時刻
            $weekday_morning_start = $value['weekday_morning_start'];
            // 平日早朝　終了時刻
            $weekday_morning_end = $value['weekday_morning_end'];
            // 平日早朝の超勤時間
            $diff_minute_weekday_morning = diffTime($record_date, $weekday_morning_start, $weekday_morning_end);

            // ======================================================
            // 平日一般
            // ======================================================
            // 平日一般　開始時刻
            $weekday_normal_start = $value['weekday_normal_start'];
            // 平日一般　終了時刻
            $weekday_normal_end = $value['weekday_normal_end'];
            // 平日一般の超勤時間
            $diff_minute_weekday_normal = diffTime($record_date, $weekday_normal_start, $weekday_normal_end);

            // ======================================================
            // 平日深夜
            // ======================================================
            // 平日深夜　開始時刻
            $weekday_midnight_start = $value['weekday_midnight_start'];
            // 平日深夜　終了時刻
            $weekday_midnight_end = $value['weekday_midnight_end'];
            // 平日深夜の超勤時間
            $diff_minute_weekday_midnight = diffTime($record_date, $weekday_midnight_start, $weekday_midnight_end);

            // ======================================================
            // 休日一般
            // ======================================================
            // 休日一般　開始時刻
            $holiday_start = $value['holiday_start'];
            // 休日一般　終了時刻
            $holiday_end = $value['holiday_end'];
            // 休日一般の超勤時間
            $diff_minute_holiday = diffTime($record_date, $holiday_start, $holiday_end);

            // ======================================================
            // 休日深夜
            // ======================================================
            // 休日深夜　開始時刻
            $holiday_midnight_start = $value['holiday_midnight_start'];
            // 休日深夜　終了時刻
            $holiday_midnight_end = $value['holiday_midnight_end'];
            // 休日深夜の超勤時間
            $diff_minute_holiday_midnight = diffTime($record_date, $holiday_midnight_start, $holiday_midnight_end);



            // 平日早朝の超勤時間を配列に追加する
            // $work_status[$key]['diff_minute_weekday_morning'] = $diff_minute_weekday_morning;

            // 平日一般の超勤時間を配列に追加する
            // $work_status[$key]['diff_minute_weekday_normal'] = $diff_minute_weekday_normal;

            // 平日深夜の超勤時間を配列に追加する
            // $work_status[$key]['diff_minute_weekday_midnight'] = $diff_minute_weekday_midnight;

            // 休日一般の超勤時間を配列に追加する
            // $work_status[$key]['diff_minute_holiday'] = $diff_minute_holiday;

            //  休日一般の超勤時間を配列に追加する
            // $work_status[$key]['diff_minute_holiday_midnight'] = $diff_minute_holiday_midnight;

            // 1レコードの勤務時間を合計して、申請日の超勤時間を算出する
            $oneday_worktime = $diff_minute_weekday_morning + $diff_minute_weekday_normal + $diff_minute_weekday_midnight + $diff_minute_holiday + $diff_minute_holiday_midnight;

            $work_status[$key]['oneday_worktime'] = $oneday_worktime;

            // 時間単位と分単位に変換
            $oneday_worktime_hour = (int)floor($oneday_worktime / 60); //floorではfloat型を返すのでint型にキャスト
            $oneday_worktime_minute = $oneday_worktime % 60;

            $work_status[$key]['oneday_worktime_hour'] = $oneday_worktime_hour;
            $work_status[$key]['oneday_worktime_minute'] = $oneday_worktime_minute;
        }

        // dd($work_status);

        return view('template_self.workstatus', compact('user_name', 'work_status'));
    }

    // 超勤一覧から任意の記録を編集する
    public function edit($id)
    {
        // GETパラメータが数字かどうかをチェックする
        // 事前にチェックしておくことでDBへの無駄なアクセスを減らせる（WEBサーバーへのアクセスのみで済む）
        if (!ctype_digit($id)) {
            return redirect('/workstatus/mypage')->with('flash_message', '不正な操作が行われました');
        }

        // $worktimeRecord = WorktimeRecord::find($id); これだとurlから他のユーザーの記録情報を操作できてしまう

        // 編集は自分が登録したものしかできないようにする
        $worktimeRecord = Auth::user()->worktime_records()->find($id);

        // 平日早朝の時刻(5:00~8:30)
        $weekday_morning_start = range(mktime(5, 0, 0, 0, 0, 0), mktime(8, 15, 0, 0, 0, 0), 60 * 15);
        $weekday_morning_end = range(mktime(5, 15, 0, 0, 0, 0), mktime(8, 30, 0, 0, 0, 0), 60 * 15);

        // 平日一般の時刻
        $weekday_normal_start  = range(mktime(17, 15, 0, 0, 0, 0), mktime(21, 45, 0, 0, 0, 0), 60 * 15);
        $weekday_normal_end = range(mktime(17, 30, 0, 0, 0, 0), mktime(22, 0, 0, 0, 0, 0), 60 * 15);

        // 平日深夜の時刻
        $weekday_midnight_start = range(mktime(22, 0, 0, 0, 0, 0), mktime(28, 45, 0, 0, 0, 0), 60 * 15);
        $weekday_midnight_end = range(mktime(22, 15, 0, 0, 0, 0), mktime(29, 0, 0, 0, 0, 0), 60 * 15);

        // 休日一般
        $holiday_start = range(mktime(5, 0, 0, 0, 0, 0), mktime(21, 45, 0, 0, 0, 0), 60 * 15);
        $holiday_end = range(mktime(5, 15, 0, 0, 0, 0), mktime(22, 0, 0, 0, 0, 0), 60 * 15);

        // 休日深夜
        $holiday_midnight_start = range(mktime(22, 0, 0, 0, 0, 0), mktime(28, 45, 0, 0, 0, 0), 60 * 15);
        $holiday_midnight_end = range(mktime(22, 15, 0, 0, 0, 0), mktime(29, 0, 0, 0, 0, 0), 60 * 15);

        return view('template_self.worktime-edit', compact('worktimeRecord', 'weekday_morning_start', 'weekday_morning_end', 'weekday_normal_start', 'weekday_normal_end', 'weekday_midnight_start', 'weekday_midnight_end', 'holiday_start', 'holiday_end', 'holiday_midnight_start', 'holiday_midnight_end'));
    }

    // 超勤記録を更新する
    public function update(WorkTimeRecordPost $request, $id)
    {
        // GETパラメータが数字かどうかをチェックする
        // 事前にチェックしておくことでDBへの無駄なアクセスを減らせる（WEBサーバーへのアクセスのみで済む）
        if (!ctype_digit($id)) {
            return redirect('/workstatus/mypage')->with('flash_message', '不正な操作が行われました');
        }

        // 更新するレコードを取得（newだと新規登録になるので注意）
        // $worktimeRecord = WorktimeRecord::find($id);
        $worktimeRecord = Auth::user()->worktime_records()->find($id);

        // 現在のログインユーザーが勤務時間内容を更新する
        Auth::user()->worktime_records()->save($worktimeRecord->fill($request->all()));

        // マイページにリダイレクトする
        // その時にsessionフラッシュにメッセージを入れる
        return redirect('/workstatus/mypage')->with('flash_message', '超勤を更新しました');
    }

    // 超勤記録を削除する
    public function destroy($id)
    {
        // GETパラメータが数字かどうかをチェックする
        // 事前にチェックしておくことでDBへの無駄なアクセスを減らせる（WEBサーバーへのアクセスのみで済む）
        if (!ctype_digit($id)) {
            return redirect('/workstatus/mypage')->with('flash_message', '不正な操作が行われました');
        }

        // 削除するレコードを取得して削除
        Auth::user()->worktime_records()->find($id)->delete();

        return redirect('/workstatus/mypage')->with('flash_message', '記録を削除しました');
    }
}
