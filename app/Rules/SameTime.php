<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SameTime implements Rule
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
            $start_time = $_POST['weekday_morning_start'];
            $end_time = $_POST['weekday_morning_end'];
        } elseif ($attribute === 'weekday_normal_end') {
            $start_time = $_POST['weekday_normal_start'];
            $end_time = $_POST['weekday_normal_end'];
        } elseif ($attribute === 'weekday_midnight_end') {
            $start_time = $_POST['weekday_midnight_start'];
            $end_time = $_POST['weekday_midnight_end'];
        } elseif ($attribute === 'holiday_end') {
            $start_time = $_POST['holiday_start'];
            $end_time = $_POST['holiday_end'];
        } elseif ($attribute === 'holiday_midnight_end') {
            $start_time = $_POST['holiday_midnight_start'];
            $end_time = $_POST['holiday_midnight_end'];
        }

        // 先にNullTimeルールを実行しておくこと
        // フォームリクエストでルールを設定する場合は、①NullTime　、②SameTime　　・・・　という順番にすること
        // 先にNULLかどうかを判定、どちらも入力されている場合に、同時刻かどうかをチェックする

        // どちらも入力されていない場合はDBへの登録を許可する
        if (empty($start_time) && empty($end_time)) {

            return true;

            // どちらかしか入力されていない場合はfalse
        } elseif ($start_time === $end_time) {

            //勤務時刻の開始と終了が同じであることはないので、falseとする
            return false;
        } else {

            // 異なる場合はtrue;
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
        return '開始時刻と終了時刻は異なる時刻としてください';
    }
}
