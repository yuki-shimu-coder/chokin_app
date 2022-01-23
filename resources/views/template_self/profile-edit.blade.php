@extends('template_self.app')

@section('title','プロフィール編集画面')

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
      <h1 class="p-profile__title u-mgb--40">プロフィール編集</h1>

      <form action="{{route('profile-update')}}" method="POST">
        @csrf

        {{-- ユーザーネーム入力欄 --}}
        <label for="username">ユーザーネーム</label>
        <div id="c-input-username">
          <i class="fas fa-user c-input-icon"></i>
          {{-- old()の第二引数 --}}
          <input type="text" class="c-auth-input @error('name') is-invalid @enderror" placeholder="名前を入力してください"
            id="username" name="name" value="{{ old('name', isset($user->name) ? $user->name : '') }}">
          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        {{-- email入力欄 --}}
        <label for="email">メールアドレス</label>
        <div id="c-input-email">
          <i class="fas fa-envelope c-input-icon"></i>
          <input type="text" class="c-auth-input @error('email') is-invalid @enderror" placeholder="Emailアドレスを入力してください"
            id="email" name="email" value="{{ old('email', isset($user->email) ? $user->email : '') }}">
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <label for="team">所属課</label>
        <div id="c-input-password">
          <i class="fas fa-address-card c-input-icon"></i>
          <select name="team_id" class="c-auth-input" required>
            {{-- teamsテーブルから取得したデータを展開 --}}
            @foreach ($teams as $team)
            <option value="{{$team->id}}" @if ($team->id === (int)old('team_id',$belongsto_team->id)) selected
              @endif>{{$team->team_name}}</option>
            @endforeach
          </select>
          @error('team_id')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror

        </div>
        <button type="submit" class="c-button p-profile__btn">更新する</button>
      </form>

    </div>

  </div>


  {{-- デバッグ用 --}}
  {{--
  <pre>{{$user}}</pre>
  <pre>{{$belongsto_team}}</pre>
  <pre>{{$teams}}</pre> --}}
</div>

@endsection