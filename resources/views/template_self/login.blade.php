@extends('app')

@section('title','ログイン画面')

@section('content')
<div class="l-container">
  <div class="p-login">
    <div class="p-login__form">
      <h1 class="p-login__title u-mgb--40">ログイン</h1>
      <form action="" method="POST">
        <div id="c-input-email">
          <i class="fas fa-envelope c-input-icon"></i>
          <input type="text" class="c-auth-input" placeholder="Emailアドレスを入力してください">
        </div>
        <div id="c-input-password">
          <i class="fas fa-lock c-input-icon"></i>
          <input type="password" class="c-auth-input" placeholder="パスワードを入力してください">
        </div>
        <div class="p-login__form-check">
          <input type="checkbox" name="rememberMe" id="rememberMe" class="u-mgr--10">
          <label for="rememberMe">情報を記憶する</label>
        </div>
        <div class="p-login__password-re">
          <p><a href="">パスワードを忘れた方はこちら</a></p>
        </div>
        <button type="submit" class="c-button p-login__button">LOGIN</button>
      </form>
    </div>
  </div>
</div>
@endsection