<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //プロフィール編集画面のビューを表示する
    public function edit()
    {
        return view('template_self.profile-edit');
    }
}
