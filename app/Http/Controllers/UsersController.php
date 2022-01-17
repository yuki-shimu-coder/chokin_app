<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Team;

class UsersController extends Controller
{
    //プロフィール編集画面のビューを表示する
    public function edit()
    {
        // 認証済みユーザー情報を取得
        $user = Auth::user();

        // 認証ユーザーの所属を取得
        $belongsto_team = $user->team()->first();

        // teamsテーブルから全データを取得
        $teams = Team::all();

        return view('template_self.profile-edit', compact('user', 'belongsto_team', 'teams'));
    }
}
