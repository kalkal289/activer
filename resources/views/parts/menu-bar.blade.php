<div class="menu-bar">
    <ul class="menu-bar-list">
        <li><a href="{{ route('index') }}"><i class="fa-solid fa-house"></i></a></li>
        <li><a href="{{ route('followedsPost') }}"><i class="fa-solid fa-user-group"></i></a></li>
        <li><a href="{{ !Auth::guest() ? route('mypageMain', ['user' => Auth::id()]) : route('login') }}"><i class="fa-solid fa-user"></i></a></li>
        <li><a href="{{ route('search') }}"><i class="fa-solid fa-magnifying-glass"></i></a></li>
        <li><a href="#"><i class="fa-solid fa-bell"></i></a></li>
    </ul>
</div>