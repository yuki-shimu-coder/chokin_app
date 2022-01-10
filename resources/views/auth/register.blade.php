@extends('template_self.app')

@section('title','新規登録')

@section('content')
<div class="l-container">
    <div class="p-signup">
        <div class="p-signup__img-wrap u-mgr--60">
            <div class="u-mgb--40">
                <img src="{{asset('img/undraw_in_the_office_re_jtgc.svg')}}" alt="">
            </div>
            <p class="u-txt-center">超勤をかんたん管理</p>
        </div>
        <div class="p-signup__form">
            <h1 class="p-signup__title u-mgb--40 u-txt-center">ユーザー登録</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- ユーザーネーム入力欄 --}}
                <div id="c-input-username">
                    <i class="fas fa-user c-input-icon"></i>
                    <input id="name" name="name" type="text" class="c-auth-input @error('name') is-invalid @enderror"
                        placeholder="名前を入力してください" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- email入力欄 --}}
                <div id="c-input-email">
                    <i class="fas fa-envelope c-input-icon"></i>
                    <input id="email" type="email" class="c-auth-input @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email"
                        placeholder="Emailアドレスを入力してください">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- password入力欄 --}}
                <div id="c-input-password">
                    <i class="fas fa-lock c-input-icon"></i>
                    <input id="password" type="password" class="c-auth-input @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" type="password"
                        placeholder="パスワードを入力してください">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- password再入力欄 --}}
                <div id="c-input-password-re">
                    <i class="fas fa-lock c-input-icon"></i>
                    <input id="password-confirm" type="password" class="c-auth-input" name="password_confirmation"
                        required autocomplete="new-password" placeholder="もう一度パスワードを入力してください">
                </div>

                {{-- 所属部署選択欄--}}
                <div id="c-input-teams">
                    <i class="fas fa-address-card c-input-icon"></i>
                    <select name="team_id" class="c-auth-input" required>
                        {{-- teamsテーブルから取得したデータを展開 --}}
                        @foreach ($teams as $team)
                        <option value="{{$team->id}}" @if ($team->id === (int)old('team_id')) selected
                            @endif>{{$team->team_name}}</option>
                        @endforeach
                    </select>
                    @error('team_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button type="submit" class="c-button p-signup__button">SIGN UP</button>
            </form>
        </div>
    </div>
</div>
@endsection