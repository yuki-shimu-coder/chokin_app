<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\LargeStart;

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
            'weekday_morning_end' => [new LargeStart],
            'weekday_normal_start' => [],
            'weekday_normal_end' => [new LargeStart],
            'weekday_midnight_start' => [],
            'weekday_midnight_end' => [new LargeStart],
            'holiday_start' => [],
            'holiday_end' => [new LargeStart],
            'holiday_midnight_start' => [],
            'holiday_midnight_end' => [new LargeStart],
            'work_content' => ['required']
        ];
    }
}
