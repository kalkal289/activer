<!--投稿テンプレート-->

<!DOCTYPE html>
<html lang="{{ str_replace'_', '-', app)->getLocale)) }}">

<head>
  <meta charset="utf-8" />
  <title>トップページ</title>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" />
  <!--FontAwesome-->
  <script src="https://kit.fontawesome.com/68afbe7e1a.js" crossorigin="anonymous"></script>
</head>
<x-app-layout>

  <body>
    <div class="window">
      <div class="all-container">
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
                  <!-- @csrf -->
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                    ログアウト </a>
                </form>
              </li>
            </ul>
          </div>
        </header>

        <main>
          <div class="center-area">
            <div class="center-title-area">
              <h1 class="center-title">トップページ</h1>
              <div class="center-title-border"></div>
            </div>
            <div class="center-container">
              <div class="center-contents-area">
                <article class="post {{ ($post->is_big_post == 1) ? " big-post-effect" : "" }}">
                  <div class="post-header">
                    <div class="post-profile">
                      <div>
                        <a href="{{ route('profileMain') }}">
                          <img class="post-profile-img" src="{{ $post->user->profile_image }}" alt="プロフィール画像" />
                        </a>
                      </div>
                      <div class="post-user-info">
                        <div class="post-user-name">
                          <a href="{{ route('profileMain') }}">
                            <h3>かるかる</h3>
                          </a>
                        </div>
                        <ul class="user-tags-list">
                          <li>
                            <a href="#">#アプリ開発</a>
                          </li>
                          <li>
                            <a href="#">#イラスト</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="post-menu">
                      <div class="post-menu-btn">
                        <i>・・</i>
                      </div>
                      <ul class="post-menu-list">
                        <li>
                          <a class="edit-btn" href="{{ route('profile.edit') }}">編集</a>
                        </li>
                        <li>
                          <form action="/posts/{{ $post->id }}" id="deletePost{{ $post->id }}" method="post">
                            <button class="delete-btn" type="button" onClick="deletePost({{ $post->id }})">削除</button>
                          </form>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="post-body">
                    <p>あああああああああああああああああああああああああああああああああああああああああああああああああああああああ</p>
                  </div>
                  <div class="post-images">
                    <img class="post-image-many" alt="画像が読み込めません。"/>
                    <img class="post-image-many" alt="画像が読み込めません。"/>
                    <img class="post-image-many" alt="画像が読み込めません。"/>
                    <img class="post-image-many" alt="画像が読み込めません。"/>
                  </div>
                  <div class="post-act-area">
                    <div>
                      <a href="/posts/{{ $post->id }}" class="post-act-btn post-comment-btn">コメント: 100</a>
                    </div>
                    <div>
                      <a href="/like/{{ $post->id }}" class="post-act-btn post-like-btn">いいね: 32795</a>
                    </div>
                  </div>
                  <div class="post-info">
                    <small class="post-category">カテゴリー: アプリ開発</small>
                    <small>投稿日: 20xx-xx-xx</small>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </main>

        <aside class="side-bar">
          <div class="search-container">
            <div class="search-area">
              <h4 class="search-title">〈 検索 〉</h4>
              <select id="type_select" class="type-select" name="type" onChange="typeChange()">
                  <option value="1" selected>投稿</option>
                  <option value="2">メインコンテンツ</option>
                  <option value="3">ストアコンテンツ</option>
                </select>
              <form id="search_form" action="/mains/filter" method="GET" class="search-form">
                <input class="search-keyword" type="text" name="keyword" placeholder="キーワードを入力" />
                <div class="search-checkbox flex">
                  <input id="checkbox_follow" class="checkbox-follow" type="checkbox" name="is_followed_user" />
                  <label class="checkbox-label" for="checkbox_follow">フォローしている人のみ</label>
                </div>
                <div id="bigpost_checkbox" class="search-checkbox flex">
                  <input id="checkbox_big_post" class="checkbox-big-post" type="checkbox" name="is_big_post" />
                  <label class="checkbox-label" for="checkbox_big_post">ビッグポストのみ</label>
                </div>
                <input class="search-btn" type="submit" value="検索" />
              </form>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </body>
</x-app-layout>

</html>


<!--メインコンテンツテンプレート-->

<!DOCTYPE html>
<html lang="{{ str_replace'_', '-', app)->getLocale)) }}">

<head>
  <meta charset="utf-8" />
  <title>トップページ</title>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" />
  <!--FontAwesome-->
  <script src="https://kit.fontawesome.com/68afbe7e1a.js" crossorigin="anonymous"></script>
</head>
<x-app-layout>

  <body>
    <div class="window">
      <div class="all-container">
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
                  <!-- @csrf -->
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                    ログアウト </a>
                </form>
              </li>
            </ul>
          </div>
        </header>

        <main>
          <div class="center-area">
            <div class="center-title-area">
              <h1 class="center-title">トップページ</h1>
              <div class="center-title-border"></div>
            </div>
            <div class="center-container">
              <div class="center-contents-area">
                <article class="post {{ ($post->is_big_post == 1) ? " big-post-effect" : "" }}">
                  <div class="post-header">
                    <div class="content-title-area">
                      <h2 class="content-title">アプリ開発をしています!Laravelを使って勉強をしています!よろしくお願いします!!
                      </h2>
                    </div>
                    <div class="post-menu">
                      <div class="post-menu-btn">
                        <i>・・</i>
                      </div>
                      <ul class="post-menu-list">
                        <li>
                          <a class="edit-btn" href="{{ route('profile.edit') }}">編集</a>
                        </li>
                        <li>
                          <form action="/posts/{{ $post->id }}" id="deletePost{{ $post->id }}" method="post">
                            <button class="delete-btn" type="button" onClick="deletePost({{ $post->id }})">削除</button>
                          </form>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="post-body">
                    <p>あああああああああああああああああああああああああああああああああああああああああああああああああああああああ</p>
                  </div>
                  <div class="post-images">
                    <img class="post-image-two" src="https://res.cloudinary.com/drs9gzes2/image/upload/v1696940865/rqafivgezqr6yjax4tcd.jpg" alt="画像が読み込めません。"/>
                    <img class="post-image-two" src="https://res.cloudinary.com/drs9gzes2/image/upload/v1696940867/x6yxc61ich6wiqfr9uvz.jpg" alt="画像が読み込めません。"/>
                    <!-- <img class="post-image-many" src="https://res.cloudinary.com/drs9gzes2/image/upload/v1696940865/rqafivgezqr6yjax4tcd.jpg" alt="画像が読み込めません。"/>
                    <img class="post-image-many" src="https://res.cloudinary.com/drs9gzes2/image/upload/v1696940867/x6yxc61ich6wiqfr9uvz.jpg" alt="画像が読み込めません。"/> -->
                  </div>

                  <div class="content-footer">
                    <div class="content-info">
                      <small class="post-category">カテゴリー: アプリ開発</small>
                      <small>更新日: 2023-10-12 15/34/29</small>
                    </div>
                    <div class="content-profile">
                      <div>
                        <a href="{{ route('mypageMain', ['user' => $post->user->id]) }}">
                          <img class="post-profile-img" src="https://res.cloudinary.com/drs9gzes2/image/upload/v1695899747/yvq9jxpoejrbwnza1zgg.jpg" alt="プロフィール画像" />
                        </a>
                      </div>
                      <div class="post-user-info">
                        <div class="post-user-name">
                          <a href="{{ route('mypageMain', ['user' => $post->user->id]) }}">
                            <h3>かるかる</h3>
                          </a>
                        </div>
                        <ul class="user-tags-list">
                          <li>
                            <a href="#">#アプリ開発</a>
                          </li>
                          <li>
                            <a href="#">#イラスト</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </main>

        <aside class="side-bar">
          <div class="search-container">
            <div class="search-area">
              <h4 class="search-title">〈 検索 〉</h4>
              <select id="type_select" class="type-select" name="type" onChange="typeChange()">
                  <option value="1" selected>投稿</option>
                  <option value="2">メインコンテンツ</option>
                  <option value="3">ストアコンテンツ</option>
                </select>
              <form id="search_form" action="/mains/filter" method="GET" class="search-form">
                <input class="search-keyword" type="text" name="keyword" placeholder="キーワードを入力" />
                <div class="search-checkbox flex">
                  <input id="checkbox_follow" class="checkbox-follow" type="checkbox" name="is_followed_user" />
                  <label class="checkbox-label" for="checkbox_follow">フォローしている人のみ</label>
                </div>
                <div id="bigpost_checkbox" class="search-checkbox flex">
                  <input id="checkbox_big_post" class="checkbox-big-post" type="checkbox" name="is_big_post" />
                  <label class="checkbox-label" for="checkbox_big_post">ビッグポストのみ</label>
                </div>
                <input class="search-btn" type="submit" value="検索" />
              </form>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </body>
</x-app-layout>

</html>


<!--フォロー 一覧-->

<!DOCTYPE html>
<html lang="{{ str_replace'_', '-', app)->getLocale)) }}">

<head>
  <meta charset="utf-8" />
  <title>トップページ</title>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" />
  <!--FontAwesome-->
  <script src="https://kit.fontawesome.com/68afbe7e1a.js" crossorigin="anonymous"></script>
</head>
<x-app-layout>

  <body>
    <div class="window">
      <div class="all-container">
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
                  <!-- @csrf -->
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                    ログアウト </a>
                </form>
              </li>
            </ul>
          </div>
        </header>

        <main>
          <div class="center-area">
            <div class="center-user-info-area">
              <div class="center-user-info">

                <div class="post-header">
                    <div class="list-user-header">
                      <div class="list-user-profile">
                        <div>
                          <a href="{{ route('mypageMain', ['user' => $user->id]) }}">
                            <img class="post-profile-img" src="https://res.cloudinary.com/drs9gzes2/image/upload/v1696940818/yujj4f3cmgwdio4szitk.jpg" alt="プロフィール画像" />
                          </a>
                        </div>
                        <div class="post-user-info">
                          <div class="post-user-name">
                            <a href="{{ route('mypageMain', ['user' => $user->id]) }}">
                              <h3>かるかる</h3>
                            </a>
                          </div>
                          <div class="list-account-name">
                            <a href="{{ route('mypageMain', ['user' => $user->id]) }}">
                              <p>@testuser1</p>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="list-user-tags-area">
                        <ul class="user-tags-list">
                          <li>
                            <a href="#">#アプリ開発</a>
                          </li>
                          <li>
                            <a href="#">#イラストあああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="follow-btn-area">
                      <a href="/follow/{{ $user->id }}" class="follow-btn">フォロー</a>
                    </div>
                  </div>
                  <div class="user-follow-info-area">
                    <p class="user-follow-info">
                      <a href="#">フォロー中: 935</a>
                    </p>
                    <p class="user-follow-info">
                      <a href="#">フォロワー: 12423</a>
                    </p>
                  </div>
                
              </div>
              <div class="follow-list-title-area">
                <h2 class="follow-list-title">フォロー中 一覧</h2>
              </div>
              <div class="center-title-border"></div>
            </div>
            <div class="center-container">
              <div class="center-user-list-area">
                <article class="post user-list-shadow-color">
                  <div class="post-header">


                    <div class="list-user-header">
                      <div class="list-user-profile">
                        <div>
                          <a href="{{ route('mypageMain', ['user' => $user->id]) }}">
                            <img class="post-profile-img" src="https://res.cloudinary.com/drs9gzes2/image/upload/v1696940818/yujj4f3cmgwdio4szitk.jpg" alt="プロフィール画像" />
                          </a>
                        </div>
                        <div class="post-user-info">
                          <div class="post-user-name">
                            <a href="{{ route('mypageMain', ['user' => $user->id]) }}">
                              <h3>かるかる</h3>
                            </a>
                          </div>
                          <div class="list-account-name">
                            <a href="{{ route('mypageMain', ['user' => $user->id]) }}">
                              <p>@testuser1</p>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="list-user-tags-area">
                        <ul class="user-tags-list">
                          <li>
                            <a href="#">#アプリ開発</a>
                          </li>
                          <li>
                            <a href="#">#イラストあああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="follow-btn-area">
                      <a href="/follow/{{ $user->id }}" class="follow-btn">フォロー</a>
                    </div>
                  </div>


                  <div class="post-body">
                    <p>
                      <a
                        href="{{ route('mypageMain', ['user' => $user->id]) }}">大学生です！かわいいイラストを描くために日々練習しています！！ラフや完成したイラストを投稿していく予定ですのでよろしくお願いします！！</a>
                    </p>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </main>
        <aside class="side-bar"></aside>
      </div>
    </div>
  </body>
</x-app-layout>

</html>