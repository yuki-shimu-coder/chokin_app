@extends('template_self.app')

@section('content')
<div class="l-container">
    <div class="p-login">
        <div class="p-login__form">
            <h1 class="p-login__title u-mgb--40">ログイン</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                {{-- email入力欄 --}}
                <div id="c-input-email">
                    <i class="fas fa-envelope c-input-icon"></i>
                    <input id="email" type="email" class="c-auth-input @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
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
                        name="password" required autocomplete="current-password" placeholder="パスワードを入力してください">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                {{-- ログイン保持 --}}
                <div class="p-login__form-check">
                    <input class="u-mgr--10" type="checkbox" name="remember" id="remember" {{ old('remember')
                        ? 'checked' : '' }}>
                    <label for="remember" style="margin:0;">情報を記憶する</label>
                </div>

                {{-- パスワードリマインド --}}
                <div class="p-login__password-re">
                    @if (Route::has('password.request'))
                    <a class="" href="{{ route('password.request') }}">
                        パスワードを忘れた方はこちら
                    </a>
                    @endif
                </div>



                <button type="submit" class="c-button p-login__button">LOGIN</button>
            </form>
        </div>
    </div>
</div>

@endsection