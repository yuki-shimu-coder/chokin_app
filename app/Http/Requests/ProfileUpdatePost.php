<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdatePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // ユーザー認証が必要なときはtrueにする
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
            //プロフィール編集の更新時バリデーションチェック
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'email', 'max:255',

                // 重複チェック。Rule::unique('テーブル名')->ignore(主キー, '主キーのカラム名')
                // ignoreメソッドの第二引数は、テーブルの主キーとして id 以外のカラム名を指定していなければ不要。
                // 認証済みユーザーのidを無視して、usersテーブルのemailカラムの重複チェックを行う。
                // whereNullメソッドは指定したカラムの値がNULLである条件を加えます。
                // whereNull('deleted_at')とすることで、
                // (deleted_atがnullのもの)　＝　(論理削除されていない)　という条件を追加している
                Rule::unique('users')->ignore(Auth::id())->whereNull('deleted_at'),
            ],
            'team_id' => ['required'],
        ];
    }
}
