<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coachtech flea market app</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
                <a href="{{ route('home') }}">
                    <img class="header__logo" src="{{ asset('img/COACHTECHヘッダーロゴ.png') }}">
                </a>
                <form class="header-search" action="{{ route('home') }}" method="GET">
                    <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="なにをお探しですか？">
                </form>
                <ul class="header-nav">
                @auth
                    <li class="header-nav__item">
                        <a class="header-nav__link" href="/mypage">マイページ</a>
                    </li>
                    <li class="header-nav__item">
                        <form class="form" action="/logout" method="post">
                        @csrf
                            <button class="header-nav__button">ログアウト</button>
                        </form>
                    </li>
                    <li class="header-nav__item">
                        <a href="/sell" class="header-nav__button--sell">出品</a>
                    </li>
                @else
                    <li class="header-nav__item">
                        <a class="header-nav__link" href="{{ route('login') }}">ログイン</a>
                    </li>
                @endauth
                </ul>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js"></script>
</body>

</html>
