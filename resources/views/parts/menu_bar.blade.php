<div class="menu-bar">
    <ul class="menu-bar-list">
        @if(Auth::guest())
            <li><a href="{{ route('index') }}"><i class="fa-solid fa-house"></i></a></li>
            <li><a href="{{ route('entrance', ['kind' => 3]) }}"><i class="fa-solid fa-user-group"></i></a></li>
            <li><a href="{{ route('entrance', ['kind' => 4]) }}"><i class="fa-solid fa-user"></i></a></li>
            <li><a href="{{ route('entrance', ['kind' => 5]) }}"><i class="fa-solid fa-magnifying-glass"></i></a></li>
            <li><a href="{{ route('entrance', ['kind' => 6]) }}"><i class="fa-solid fa-bell"></i></a></li>
        @else
            <li><a href="{{ route('index') }}"><i class="fa-solid fa-house"></i></a></li>
            <li><a href="{{ route('followedsPost') }}"><i class="fa-solid fa-user-group"></i></a></li>
            <li><a href="{{ !Auth::guest() ? route('mypageMain', ['user' => Auth::id()]) : route('login') }}"><i class="fa-solid fa-user"></i></a></li>
            <li><a href="{{ route('search') }}"><i class="fa-solid fa-magnifying-glass"></i></a></li>
            <li><a href="{{ route('showNotifications') }}"><i class="fa-solid fa-bell"></i></a></li>
        @endif
    </ul>
</div>