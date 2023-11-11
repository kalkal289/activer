<div class="center-container">
    <div class="center-mypage-profile-area">
    
        @include('parts.profile_header', [
        'user' => $user,
        'kind' => 2,
        ])
    
        <div class="profile-body">
            <p>
                <a href="{{ route('mypageMain', ['user' => $user->id]) }}">{!! nl2br($user->message) !!}</a>
            </p>
        </div>
        <div class="mypage-profile-bottom">
            <div class="user-follow-info-area">
                <p class="user-follow-info">
                    <a href="/followeds/{{ $user->id }}">フォロー中 <span id="followeds_count" class="follow-count">{{ $user->followeds()->count() }}</span></a>
                </p>
                <p class="user-follow-info">
                    <a href="/followers/{{ $user->id }}">フォロワー <span id="followers_count" class="follow-count">{{ $user->followers()->count() }}</span></a>
                </p>
            </div>
            <div>
                <a class="like-post-list-btn" href="/mypages/likes/{{ $user->id }}">いいね一覧</a>
            </div>
        </div>
    </div>
</div>
<div class="mypage-menu-bar">
    <a href="/mypages/{{ $user->id }}" class="mypage-menu-btn {{ ($kind == 0) ? "now-area-btn" : "" }}">Main</a>
    <a href="/mypages/posts/{{ $user->id }}" class="mypage-menu-btn {{ ($kind == 1) ? "now-area-btn" : "" }}">Post</a>
    <a href="/mypages/big/{{ $user->id }}" class="mypage-menu-btn {{ ($kind == 2) ? "now-area-btn" : "" }}">BigPost</a>
    <a href="/mypages/store/{{ $user->id }}" class="mypage-menu-btn {{ ($kind == 3) ? "now-area-btn" : "" }}">Store</a>
</div>