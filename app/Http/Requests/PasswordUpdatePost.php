<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdatePost extends FormRequest
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
            //パスワード編集画面で現在のパスワードをチェックする
            // バリデーションルールpasswordは、認証中のユーザーのパスワードと一致することをバリデートします。
            'pass_old' => ['required', 'string', 'min:8', 'password'],

            // 新しいパスワードとその再入力が一致しているかをチェックする
            // バリデーションルールconfirmedは、同値チェックを行う。
            'pass_new' => ['required', 'string', 'min:8', 'confirmed'],

        ];
    }
}
