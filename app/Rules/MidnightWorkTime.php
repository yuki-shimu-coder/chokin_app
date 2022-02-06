<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MidnightWorkTime implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //深夜の勤務時間が７時間以上になっていないかチェックする
        if ($attribute === 'weekday_midnight_end') {
            $start_time = strtotime($_POST['weekday_midnight_start']);
            $end_time = strtotime($value);
        } elseif ($attribute === 'holiday_midnight_end') {
            $start_time = strtotime($_POST['holiday_midnight_start']);
            $end_time = strtotime($value);
        }

        // 開始時刻が５時以降でかつ終了時刻が0時から5時の場合は、24時間分の秒数を加算する
        // こうしないと、日をまたいだ場合に、　開始時刻 > 終了時刻となり、意図しない結果が返される。
        // 日をまたぐ場合でも正確な比較を可能にするために、終了時刻が0時から５時までの場合は、24時間分の秒数を加算する
        // 例：　開始時刻 22:00  終了時刻 5:00　の場合　　では 開始時刻 > 終了時刻と判別されエラーが発生する。

        if ($start_time >= strtotime('5:00') && $end_time <= strtotime('5:00')) {
            $end_time += 86400;
        }

        $diff_time = ($end_time - $start_time) / 3600;

        // 深夜の勤務時間が７時間を超えた場合は、false
        // 深夜の勤務時間は最長で７時間(２２時〜５時)
        if ($diff_time > 7) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '深夜の勤務時間は22時から5時の間で入力してください';
    }
}
