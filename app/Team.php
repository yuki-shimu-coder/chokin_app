<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //$fillableの設定
    protected $fillable = ['team_name'];

    // リレーションの設定
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
