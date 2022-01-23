@extends('template_self.app')

@section('title','パスワード編集画面')

@section('content')

<div class="l-container">
  <div class="p-profile">

    {{-- サイドバー --}}
    <div class="p-profile__side">
      <ul>
        <li class="p-profile__list-item"><a href="{{route('profile-edit')}}">プロフィール編集</a></li>
        <li class="p-profile__list-item"><a href="{{route('password-edit')}}">パスワード編集</a></li>
        <li class="p-profile__list-item"><a href="">退会</a></li>
      </ul>
    </div>

    {{-- 編集メイン --}}
    <div class="p-profile__main">
      <h1 class="p-profile__title u-mgb--40">パスワード編集</h1>
      <form action="{{route('password-update')}}" method="POST">
        @csrf
        <label for="oldPass">現在のパスワード</label>
        <div id="c-input-username">
          <i class="fas fa-lock c-input-icon"></i>
          <input type="password" class="c-auth-input @error('pass_old') is-invalid @enderror" name="pass_old"
            placeholder="現在のパスワードを入力してください" id="pass_old">

          @error('pass_old')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <label for="newPass">新しいパスワード</label>
        <div id="c-input-email">
          <i class="fas fa-lock c-input-icon"></i>
          <input type="password" class="c-auth-input @error('pass_new') is-invalid @enderror" name="pass_new"
            placeholder="新しいパスワードを入力してください" id="pass_new">

          @error('pass_new')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <label for="newPass-re">新しいパスワード（再入力）</label>
        <div id="c-input-password">
          <i class="fas fa-lock c-input-icon"></i>
          <input type="password" class="c-auth-input" name="pass_new_confirmation" placeholder="再入力してください"
            id="pass_new_confirmation">
        </div>
        <button type="submit" class="c-button p-profile__btn">パスワードを変更する</button>
      </form>

    </div>

  </div>


</div>

@endsection