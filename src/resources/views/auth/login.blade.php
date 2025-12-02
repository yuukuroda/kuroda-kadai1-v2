<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                FashionablyLate
            </a>
            <nav>
                <ul class="header-nav">
                    <li class="header-nav__item">
                        <a class="header-nav__link" href="/register">register</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="login-form">
            <!-- ヘッダー -->
            <div class="login-form__heading">
                <h2>Login</h2>
            </div>
            <!-- 入力欄 -->
            <form class="form" action="/login" method="post">
                @csrf
                <!-- メールアドレス入力欄 -->
                <span class="login-form__title">メールアドレス</span>
                <div class="login-form__input--text">
                    <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}" />
                </div>
                <!-- パスワード入力欄 -->
                <span class="login-form__title">パスワード</span>
                <div class="login-form__input--text">
                    <input type="password" name="password" placeholder="例:coachtech1106" value="{{ old('password') }}" />
                </div>
                <!-- ログインボタン -->
                <div class="form__button">
                    <button class="form__button-submit" type="submit">ログイン</button>
                </div>
        </div>
        </form>
    </main>
</body>

</html>