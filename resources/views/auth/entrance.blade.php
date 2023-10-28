<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <title>activer entrance</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" />
  </head>
  <x-app-layout>
    <body>
      <div class="window">
        <div class="all-container">
          <main>
            <div class="center-area">
              <div class="entrance-area">
                <div class="entrance-upper-area">
                  <div class="back-btn-area">
                    <p class="back-btn" onClick="history.back()"><span class="text-orange-300"><i class="fa-solid fa-arrow-left"></i></span> back</p>
                  </div>
                  <div class="entrance-title-area">
                      <!--$kindはいいねなら0、コメントなら1、投稿なら2、フォロー中なら3、マイページなら4、検索なら5、通知なら6、投稿詳細なら7、他ユーザーページなら8-->
                      @if($kind == 0)
                        <h1>あなたもログインしてお気に入りの投稿に<span class="entrance-keyword entrance-like"><i class="fa-solid fa-heart"></i>いいね</span>しよう！</h1>
                      @elseif($kind == 1)
                        <h1>あなたもログインしてお気に入りの投稿に<span class="entrance-keyword entrance-comment"><i class="fa-regular fa-comment"></i>コメント</span>しよう！</h1>
                      @elseif($kind == 2)
                        <h1>あなたもログインして日々の出来事を<span class="entrance-keyword"><i class="fa-solid fa-pen"></i>投稿</span>しよう！</h1>
                      @elseif($kind == 3)
                        <h1>あなたもログインしてお気に入りのユーザーを<span class="entrance-keyword"><i class="fa-solid fa-user-group"></i>フォロー</span>しよう！</h1>
                      @elseif($kind == 4)
                        <h1>あなたもログインして自分の<span class="entrance-keyword"><i class="fa-solid fa-user"></i>マイページ</span>を作成しよう！</h1>
                      @elseif($kind == 5)
                        <h1>あなたもログインして投稿やユーザーを<span class="entrance-keyword"><i class="fa-solid fa-magnifying-glass"></i>検索</span>しよう！</h1>
                      @elseif($kind == 6)
                        <h1>あなたもログインして<span class="entrance-keyword"><i class="fa-solid fa-magnifying-glass"></i>通知</span>を受け取ろう！</h1>
                      @elseif($kind == 7)
                        <h1>あなたもログインして<span class="entrance-keyword"><i class="fa-solid fa-file"></i>投稿詳細画面</span>で投稿のコメントを見てみよう！</h1>
                      @elseif($kind == 8)
                        <h1>あなたもログインしてお気に入りのユーザーの<span class="entrance-keyword"><i class="fa-solid fa-user"></i>マイページ</span>を見てみよう！</h1>
                      @endif
                  </div>
                </div>
                <div class="entrance-img">
                  <img src="https://res.cloudinary.com/drs9gzes2/image/upload/v1696507653/Activer_j1kneb.png" alt="">
                </div>
                <div class="header-login-btn-area entrance-btn-area">
                  <ul>
                    <li class="header-sign-up-btn">
                      <a href="{{ route('register') }}"><i class="fa-solid fa-user-plus"></i> 新規登録</a>
                    </li>
                    <li class="header-login-btn">
                      <a href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i> ログイン</a>
                    </li>
                  </ul>
                  <div class="entrance-message-area">
                    <span>※</span>
                    <p class="entrance-message">テストアカウントご希望の方は、ログイン画面にテストアカウントが記載してありますので、そちらをご利用ください。</p>
                  </div>
                </div>
              </div>
            </div>
          </main>
        </div>
      </div>
    </body>
  </x-app-layout>
</html>

