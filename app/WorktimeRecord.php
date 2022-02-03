<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorktimeRecord extends Model
{
    //$fillableの設定

    // リレーションの設定
    public function user()
    {
        $this->belongsTo('App\User');
    }
}
