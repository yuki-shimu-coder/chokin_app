<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Team;
use App\User;
use App\Http\Requests\ProfileUpdatePost;


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

    // プロフィールを更新する
    public function update(ProfileUpdatePost $request)
    {
        // 認証ユーザーの情報を取得する
        $user = Auth::user();
        // 入力値で更新する
        $user->fill($request->all())->save();
        // マイページにリダイレクトする
        // その時にsessionフラッシュにメッセージを入れる
        return redirect('/home')->with('flash_message', 'プロフィールを更新しました。');

    }
}
