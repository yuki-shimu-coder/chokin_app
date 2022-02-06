<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\LargeStart;
use App\Rules\SameTime;
use App\Rules\NullTime;

class WorkTimeRecordPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'record_date' => ['required'],
            'weekday_morning_start' => [],
            'weekday_morning_end' => [new NullTime, new SameTime, new LargeStart],
            'weekday_normal_start' => [],
            'weekday_normal_end' => [new NullTime, new SameTime, new LargeStart],
            'weekday_midnight_start' => [],
            'weekday_midnight_end' => [new NullTime, new SameTime, new LargeStart],
            'holiday_start' => [],
            'holiday_end' => [new NullTime, new SameTime, new LargeStart],
            'holiday_midnight_start' => [],
            'holiday_midnight_end' => [new NullTime, new SameTime, new LargeStart],
            'work_content' => ['required'],
            'worktimes' => ['required_without_all:weekday_morning_start,weekday_morning_end,weekday_normal_start,weekday_normal_end,weekday_midnight_start,weekday_midnight_end,holiday_start,holiday_end,holiday_midnight_start,holiday_midnight_end']
        ];
    }

    public function messages()
    {
        return [
            'worktimes.required_without_all' => '勤務時間は一つ以上入力してください。'
        ];
    }
}
