<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class LargeStart implements Rule
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

        // ルールが設定された属性毎に、$start_timeを変更する
        if ($attribute ===  'weekday_morning_end') {
            $start_time = strtotime($_POST['weekday_morning_start']);
            $end_time = strtotime($value);
        } elseif ($attribute === 'weekday_normal_end') {
            $start_time = strtotime($_POST['weekday_normal_start']);
            $end_time = strtotime($value);
        } elseif ($attribute === 'weekday_midnight_end') {
            $start_time = strtotime($_POST['weekday_midnight_start']);
            $end_time = strtotime($value);
        } elseif ($attribute === 'holiday_end') {
            $start_time = strtotime($_POST['holiday_start']);
            $end_time = strtotime($value);
        } elseif ($attribute === 'holiday_midnight_end') {
            $start_time = strtotime($_POST['holiday_midnight_start']);
            $end_time = strtotime($value);
        }

        // 終了時刻が0時から5時の場合は、24時間分の秒数を加算する
        // こうしないと、日をまたいだ場合に、　開始時刻 > 終了時刻となり、意図しない結果が返される。
        // 日をまたぐ場合でも正確な比較を可能にするために、終了時刻が0時から５時までの場合は、24時間分の秒数を加算する
        // 例：　開始時刻 22:00  終了時刻 5:00　の場合　　では 開始時刻 > 終了時刻と判別されエラーが発生する。

        if ($start_time >= strtotime('5:00') && $end_time <= strtotime('5:00')) {
            $end_time += 86400;
        }

        //開始時間が終了時間以降の時間になっていないかチェックする
        // 開始時刻と終了時刻が同時刻であった場合、trueになってしまうので、同時刻かどうかをチェックするルールを先に実行する必要がある。
        if ($start_time > $end_time) {
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
        return '終了時刻が開始時刻より前の時刻です。';
    }
}
