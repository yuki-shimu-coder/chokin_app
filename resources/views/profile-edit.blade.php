@extends('app')

@section('title','プロフィール編集画面')

@section('content')

<div class="l-container">
  <div class="p-profile">

    {{-- サイドバー --}}
    <div class="p-profile__side">
      <ul>
        <li class="p-profile__list-item"><a href="">プロフィール編集</a></li>
        <li class="p-profile__list-item"><a href="">パスワード編集</a></li>
        <li class="p-profile__list-item"><a href="">退会</a></li>
      </ul>
    </div>

    {{-- 編集メイン --}}
    <div class="p-profile__main">
      <h1 class="p-profile__title u-mgb--40">プロフィール編集</h1>
      <form action="" method="POST">
        <label for="username">ユーザーネーム</label>
        <div id="c-input-username">
          <i class="fas fa-user c-input-icon"></i>
          <input type="text" class="c-auth-input" placeholder="名前を入力してください" id="username">
        </div>

        <label for="email">メールアドレス</label>
        <div id="c-input-email">
          <i class="fas fa-envelope c-input-icon"></i>
          <input type="text" class="c-auth-input" placeholder="Emailアドレスを入力してください" id="email">
        </div>

        <label for="group">所属課</label>
        <div id="c-input-password">
          <i class="fas fa-address-card c-input-icon"></i>
          <input type="text" class="c-auth-input" placeholder="所属課を入力してください" id="group">
        </div>
        <button type="submit" class="c-button p-profile__btn">更新する</button>
      </form>

    </div>

  </div>

</div>

@endsection