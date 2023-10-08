<!--<!DOCTYPE html>-->
<!--<html lang="{ str_replace'_', '-', app)->getLocale)) }}">-->
<!--  <head>-->
<!--    <meta charset="utf-8" />-->
<!--    <title>トップページ</title>-->
<!--     Fonts -->
<!--    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" />-->
<!--  </head>-->
<!--  <body>-->
<!--    <div class="window">-->
<!--      <div class="all-container">-->
        <header class="header">
          <div class="logo-area">
            <a href="{{ route('index') }}">
              <img src="https://res.cloudinary.com/drs9gzes2/image/upload/v1696507653/Activer_j1kneb.png" alt="logo" class="logo" />
            </a>
          </div>
          <nav class="nav">
            <ul class="nav-list">
              <li><a href="{{ route('index') }}">トップ</a></li>
              <li><a href="{{ route('followedsPost') }}">フォロー中</a></li>
              <li><a href="{{ route('mypageMain', ['user' => Auth::id()]) }}">マイページ</a></li>
              <li><a href="{{ route('search') }}">検索</a></li>
              <li><a href="#">通知</a></li>
            </ul>
          </nav>
          <div class="create-btn-area">
            <a href="{{ route('create') }}">投稿</a>
          </div>
          <div class="setting-area">
            <span>アカウント</span>
            <ul class="setting-list">
              <li>
                <a href="{{ route('profile.edit') }}">設定</a>
              </li>
              <li>
                <form action="{{ route('logout') }}" method="POST">
                  @csrf

                  <a
                    href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                    ログアウト
                  </a>
                </form>
              </li>
            </ul>
          </div>
        </header>
<!--        <main></main>-->
<!--        <aside></aside>-->
<!--      </div>-->
<!--    </div>-->
<!--  </body>-->
<!--</html>-->
