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
                    <a class="user-name" href="{{ route('mypageMain', ['user' => $user->id]) }}">
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
                        <li>{!! $user->makeLinkUsertag(e($usertag->name)) !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    @if($user->id != Auth::id())
        <div class="follow-btn-area">
            @if($user->is_followed_by_auth_user())
                <span id="unfollow_btn{{ $user->id }}" class="follow-button unfollow-btn" data-user-id="{{ $user->id }}" onmouseover="onUnfollowBtn({{ $user->id }})" onmouseout="outUnfollowBtn({{ $user->id }})">フォロー中</span>
            @else
                <span id="unfollow_btn{{ $user->id }}" class="follow-button follow-btn" data-user-id="{{ $user->id }}" onmouseover="onUnfollowBtn({{ $user->id }})" onmouseout="outUnfollowBtn({{ $user->id }})">フォロー</span>
            @endif
        </div>
    @else
        <div class="edit-profile-btn-area">
            <a href="{{ route('editProfile', ['user' => $user->id]) }}" class="edit-profile-btn"><span class="sm-text">プロフィール</span><span class="sm-text">編集</span></a>
        </div>    
    @endif
</div>
            