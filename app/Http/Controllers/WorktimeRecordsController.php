<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\WorktimeRecord;
use App\Http\Requests\WorkTimeRecordPost;


class WorktimeRecordsController extends Controller
{
    //超勤記録画面のビューを表示する
    public function show()
    {
        // セレクトボックスの時刻の範囲を決定する

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

        return view('template_self.worktime-record', compact(
            'weekday_morning_start',
            'weekday_morning_end',
            'weekday_normal_start',
            'weekday_normal_end',
            'weekday_midnight_start',
            'weekday_midnight_end',
            'holiday_start',
            'holiday_end',
            'holiday_midnight_start',
            'holiday_midnight_end'
        ));
    }

    // 超勤内容の登録処理
    public function record(WorkTimeRecordPost $request)
    {
        // モデルインスタンスを用意
        $worktimeRecord = new WorktimeRecord;

        // 現在のログインユーザーが勤務時間内容を登録する
        Auth::user()->worktime_records()->save($worktimeRecord->fill($request->all()));

        // マイページにリダイレクトする
        // その時にsessionフラッシュにメッセージを入れる
        return redirect('/home')->with('flash_message', '超勤を記録しました');
    }
}
