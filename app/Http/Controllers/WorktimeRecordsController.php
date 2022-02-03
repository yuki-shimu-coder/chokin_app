<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class WorktimeRecordsController extends Controller
{
    //超勤記録画面のビューを表示する
    public function show(){
        return view('template_self.worktime-record');
    }
}
