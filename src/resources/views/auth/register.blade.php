<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
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
                        <a class="header-nav__link" href="/login">login</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="register-form">
            <!-- ヘッダー -->
            <div class="register-form__heading">
                <h2>Register</h2>
            </div>
            <!-- 入力欄 -->
            <form class="form" action="/register" method="post" novalidate>
                @csrf
                <div class="register-form__content">
                    <!-- 名前入力欄 -->
                    <span class="register-form__title">お名前</span>
                    <div class="register-form__input--text">
                        <input type="text" name="name" placeholder="例:山田  太郎" value="{{ old('name') }}" />
                    </div>
                    <!-- メールアドレス入力欄 -->
                    <span class="register-form__title">メールアドレス</span>
                    <div class="register-form__input--text">
                        <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}" />
                    </div>
                    <!-- パスワード入力欄 -->
                    <span class="register-form__title">パスワード</span>
                    <div class="register-form__input--text">
                        <input type="password" name="password" placeholder="例:coachtech1106" value="{{ old('password') }}" />
                    </div>
                    <!-- パスワード確認 -->
                    <span class="register-form__title">パスワード確認</span>
                    <div class="register-form__input--text">
                        <input type="password" name="password_confirmation" placeholder="パスワードを再度入力" />
                    </div>
                    <!-- 登録ボタン -->
                    <div class="form__button">
                        <button class="form__button-submit" type="submit">登録</button>
                    </div>
                </div>
            </form>
    </main>
</body>

</html>