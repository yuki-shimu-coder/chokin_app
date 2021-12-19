<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <title>新規登録</title>
</head>

<body>
  <header class="l-header">
    <div class="l-container">
      <div class="p-header">
        <div class="p-header__logo">
          <a href="">
            <img src="" alt="">
            Chokin Diary
          </a>
        </div>
        <nav class="p-header__nav">
          <ul class="p-header__menu">
            <li class="p-header__menu-item"><a href="">ログイン</a></li>
            <li class="p-header__menu-item"><a href="">新規登録</a></li>
          </ul>
        </nav>
        <div class="c-menu-trigger">
          <i class="fas fa-bars"></i>
        </div>
      </div>
    </div>
  </header>

  <main>
    @yield('content')
  </main>

</body>

</html>