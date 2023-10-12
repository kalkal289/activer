<!--引数1: $user（一人のユーザー）-->
<!--引数2: $kind（ユーザーリスト用 0、リストのメインユーザー用 1、マイページ用 2））-->

<div class="post-header">
    <div class="list-user-header">
        <div class="list-user-profile">
            <div>
                <a href="{{ route('mypageMain', ['user' => $user->id]) }}">
                    @if($user->profile_image)
                        <img class="post-profile-img" src="{{ $user->profile_image }}" alt="プロフィール画像" />
                    @else
                        <img class="post-profile-img" src="https://res.cloudinary.com/drs9gzes2/image/upload/v1695132757/kkrn_icon_user_14_evxlot.png" alt="プロフィール画像"/>
                    @endif
                </a>
            </div>
            <div class="post-user-info">
                <div class="{{ ($kind == 2) ? "profile-user-name" : "post-user-name" }}">
                    <a href="{{ route('mypageMain', ['user' => $user->id]) }}">
                        <h3>{{ $user->name }}</h3>
                    </a>
                </div>
                <div class="list-account-name">
                    <a href="{{ route('mypageMain', ['user' => $user->id]) }}">
                        <p>{{'@'}}{{ $user->account_name }}</p>
                    </a>
                </div>
            </div>
        </div>
        @if(count($user->usertags) || $kind != 0)
            <div class="list-user-tags-area">
                <ul class="user-tags-list">
                    @foreach ($user->usertags as $usertag)
                        <li>
                            <a href="#">#{{ $usertag->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    @if($user->id != Auth::id())
        <div class="follow-btn-area">
            @if($user->is_followed_by_auth_user())
                <a href="/unfollow/{{ $user->id }}" id="unfollow_btn{{ $user->id }}" class="unfollow-btn" onmouseover="onUnfollowBtn({{ $user->id }})" onmouseout="outUnfollowBtn({{ $user->id }})">フォロー中</a>
            @else
                <a href="/follow/{{ $user->id }}" class="follow-btn">フォロー</a>
            @endif
        </div>
    @else
        <div class="edit-profile-btn-area">
            <a href="{{ route('editProfile', ['user' => $user->id]) }}" class="edit-profile-btn">プロフィール編集</a>
        </div>    
    @endif
</div>
            