<div id="top-menu-btn" class="top-menu-btn" onClick="humburgerMenuAppear()">
    <span class="first-stick"></span>
    <span class="middle-stick"></span>
    <span class="last-stick"></span>
</div>
<div id="top-menu" class="top-menu">
    <ul class="top-menu-list">
        <li>
            <a href="{{ route('profile.edit') }}">設定</a>
        </li>
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf 
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"> ログアウト </a>
            </form>
        </li>
    </ul>
</div>