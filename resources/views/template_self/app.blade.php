<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>@yield('title') | {{config('app.name')}}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

</head>

<body>
  <header class="l-header">
    <div class="l-container">
      <div class="p-header">

        {{-- ヘッダーロゴ --}}
        <div class="p-header__logo">
          <a href="{{ url('/') }}">
            <img src="" alt="">
            Chokin Diary
          </a>
        </div>

        {{-- ヘッダーメニュー --}}

        <nav class="p-header__nav">

          {{-- ログイン前のゲスト --}}
          @guest

          <ul class="p-header__menu">
            <li class="p-header__menu-item"><a href="{{ route('login') }}">ログイン</a></li>
            <li class="p-header__menu-item"><a href="{{ route('register') }}">新規登録</a></li>
          </ul>

          @else

          {{-- ログインユーザー --}}
          <ul class="p-header__menu">
            <li class="p-header__menu-item"><a href="">超勤記録</a></li>
            <li class="p-header__menu-item"><a href="">超勤の確認</a></li>
            <li class="p-header__menu-item"><a href="">同僚の超勤を確認</a></li>
            <li class="p-header__menu-item"><a href="">プロフィールを編集</a></li>
            <li class="p-header__menu-item">
              <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();
                         ">ログアウト
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
          </ul>

          @endguest
        </nav>
        <div class="c-menu-trigger">
          <i class="fas fa-bars"></i>
        </div>
      </div>
    </div>
  </header>

  <main class="l-main">
    @yield('content')
  </main>

  <footer id="l-footer"></footer>
</body>

</html>