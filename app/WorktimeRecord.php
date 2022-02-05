<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorktimeRecord extends Model
{
    //$fillableの設定
    protected $fillable  = [
        'record_date',
        'weekday_morning_start',
        'weekday_morning_end',
        'weekday_normal_start',
        'weekday_normal_end',
        'weekday_midnight_start',
        'weekday_midnight_end',
        'holiday_start',
        'holiday_end',
        'holiday_midnight_start',
        'holiday_midnight_end',
        'work_content'
    ];

    // リレーションの設定
    public function user()
    {
        $this->belongsTo('App\User');
    }
}
