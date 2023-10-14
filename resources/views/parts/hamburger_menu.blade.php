<div id="top-menu-btn" class="top-menu-btn" onClick="humburgerMenuAppear()">
    <span class="first-stick"></span>
    <span class="middle-stick"></span>
    <span class="last-stick"></span>
</div>
<div id="top-menu" class="top-menu">
    <div class="top-menu-back" onClick="humburgerMenuAppear()"></div>
    <ul class="top-menu-list">
        @if(!Auth::guest())
            <li>
                <a href="{{ route('profile.edit') }}"><i class="fa-solid fa-gear"></i> 設定</a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf 
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fa-solid fa-right-from-bracket"></i> ログアウト</a>
                </form>
            </li>
        @else
            <li>
                <a class="menu-sign-up-btn" href="{{ route('register') }}"><i class="fa-solid fa-user-plus"></i> 新規登録</a>
            </li>
            <li>
                <a class="menu-login-btn" href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i> ログイン</a>
            </li>
        @endif
    </ul>
</div>