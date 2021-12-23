@extends('app')

@section('content')
<div class="l-container">
  <div class="p-signup">
    <div class="p-signup__img-wrap u-mgr--60">
      <div class="u-mgb--40">
        <img src="{{asset('img/undraw_in_the_office_re_jtgc.svg')}}" alt="">
      </div>
      <p>超勤をかんたん管理</p>
    </div>
    <div class="p-signup__form">
      <p class="u-mgb--40">ユーザー登録</p>
      <form action="" method="POST">
        <div id="p-input-username">
          <i class="fas fa-user c-input-icon"></i>
          <input type="text" class="c-auth-input" placeholder="名前を入力してください">
        </div>
        <div id="p-input-email">
          <i class="fas fa-envelope c-input-icon"></i>
          <input type="text" class="c-auth-input" placeholder="Emailアドレスを入力してください">
        </div>
        <div id="p-input-password">
          <i class="fas fa-lock c-input-icon"></i>
          <input type="password" class="c-auth-input" placeholder="パスワードを入力してください">
        </div>
        <div id="p-input-password-re">
          <i class="fas fa-lock c-input-icon"></i>
          <input type="password" class="c-auth-input" placeholder="もう一度パスワードを入力してください">
        </div>
        <button type="submit" class="c-button p-signup__button">Sign Up</button>
      </form>
    </div>
  </div>
</div>
@endsection