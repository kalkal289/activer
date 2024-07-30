<header class="header">
  <div class="logo-area">
    <a href="{{ route('index') }}">
      <img src="https://res.cloudinary.com/drs9gzes2/image/upload/v1696507653/Activer_j1kneb.png" alt="logo" class="logo" />
    </a>
  </div>
  
  @if(Auth::guest())
  
    <nav class="nav">
      <ul class="nav-list">
        <li><a href="{{ route('index') }}"><i class="fa-solid fa-house header-icon"></i>トップ</a></li>
        <li><a href="{{ route('entrance', ['kind' => 3]) }}"><i class="fa-solid fa-user-group header-icon"></i>フォロー中</a></li>
        <li><a href="{{ route('entrance', ['kind' => 4]) }}"><i class="fa-solid fa-user header-icon"></i>マイページ</a></li>
        <li><a href="{{ route('search') }}"><i class="fa-solid fa-magnifying-glass header-icon"></i>検索</a></li>
        <li><a href="{{ route('entrance', ['kind' => 6]) }}"><i class="fa-solid fa-bell header-icon"></i>通知</a></li>
      </ul>
    </nav>
    <div class="create-btn-area">
      <a href="{{ route('entrance', ['kind' => 2]) }}"><i class="fa-solid fa-pen header-icon"></i>投稿</a>
    </div>
    <div class="header-login-btn-area">
      <ul>
        <li class="header-sign-up-btn">
          <a href="{{ route('register') }}"><i class="fa-solid fa-user-plus"></i> 新規登録</a>
        </li>
        <li class="header-login-btn">
          <a href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i> ログイン</a>
        </li>
      </ul>
    </div>
    
  @else
  
    <nav class="nav">
      <ul class="nav-list">
        <li><a href="{{ route('index') }}"><i class="fa-solid fa-house header-icon"></i>トップ</a></li>
        <li><a href="{{ route('followedsPost') }}"><i class="fa-solid fa-user-group header-icon"></i>フォロー中</a></li>
        <li><a href="{{ !Auth::guest() ? route('mypageMain', ['user' => Auth::id()]) : route('login') }}"><i class="fa-solid fa-user header-icon"></i>マイページ</a></li>
        <li><a href="{{ route('search') }}"><i class="fa-solid fa-magnifying-glass header-icon"></i>検索</a></li>
        <li><a href="{{ route('showNotifications') }}"><i class="fa-solid fa-bell header-icon"></i>通知</a></li>
      </ul>
    </nav>
    <div class="create-btn-area">
      <a href="{{ route('create') }}"><i class="fa-solid fa-pen header-icon"></i>投稿</a>
    </div>
    <div class="setting-area">
      <span>アカウント</span>
      <ul class="setting-list">
        <li>
          <a href="{{ route('profile.edit') }}"><i class="fa-solid fa-gear"></i> 設定</a>
        </li>
        <li>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
  
            <a
              href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
              <i class="fa-solid fa-right-from-bracket"></i> ログアウト
            </a>
          </form>
        </li>
      </ul>
    </div>
    
  @endif
</header>
