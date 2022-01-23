<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Team;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdatePost;
use App\Http\Requests\PasswordUpdatePost;


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
        // $user = Auth::user();と同じ効果
        $user = $request->user();

        // 入力値で更新する
        $user->fill($request->all())->save();

        // マイページにリダイレクトする
        // その時にsessionフラッシュにメッセージを入れる
        return redirect('/home')->with('flash_message', 'プロフィールを更新しました。');
    }

    // パスワード編集画面のビューを表示する
    public function editPassword()
    {
        return view('template_self.profile-pass');
    }

    public function updatePassword(PasswordUpdatePost $request)
    {
        // 認証ユーザーの情報を取得する。
        // $user = Auth::user();と同じ効果
        $user = $request->user();

        // 新しいパスワードをハッシュ化する
        $hash_password =  Hash::make($request->pass_new);

        // ハッシュ化したパスワードを認証ユーザーのpasswordに保存する
        $user->fill([
            'password' => $hash_password,
        ])->save();

        // マイページにリダイレクトする
        // その時にsessionフラッシュにメッセージを入れる
        return redirect('/home')->with('flash_message', 'パスワードを更新しました');
    }
}
