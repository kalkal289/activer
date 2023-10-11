<!--引数： $user（一人のユーザー）-->

<article class="post post-shadow-color">
    <div class="post-header">
        <div class="post-profile">
            <div>
                <a href="{{ route('mypageMain', ['user' => $user->id]) }}">
                    @if($post->user->profile_image)
                        <img class="post-profile-img" src="{{ $user->profile_image }}" alt="プロフィール画像" />
                    @else
                        <img class="post-profile-img" src="https://res.cloudinary.com/drs9gzes2/image/upload/v1695132757/kkrn_icon_user_14_evxlot.png" alt="プロフィール画像"/>
                    @endif
                </a>
            </div>
            <div class="post-user-info">
                <div class="post-user-name">
                    <a href="{{ route('mypageMain', ['user' => $user->id]) }}">
                        <h3>{{ $user->name }}</h3>
                    </a>
                </div>
                <div class="list-account-name">
                    <a href="{{ route('mypageMain', ['user' => $user->id]) }}">
                        <p>{{ $user->account_name }}</p>
                    </a>
                </div>
            </div>
        </div>
        @if($user->id != Auth::id())
            <div class="mr-6 my-auto">
                @if($user->is_followed_by_auth_user())
                    <a href="/unfollow/{{ $user->id }}" class="p-2 border border-black rounded">フォロー解除</a>
                @else
                    <a href="/follow/{{ $user->id }}" class="p-2 border border-black rounded">フォロー</a>
                @endif
            </div>
        @endif
    </div>
    <div class="list-user-tags-area">
        <ul class="user-tags-list">
            @foreach ($user->usertags as $usertag)
                <li>
                    <a href="#">#{{ $usertag->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="post-body">
        <p>
            <a href="{{ route('mypageMain', ['user' => $user->id]) }}">{{ $user->message }}</a>
        </p>
    </div>
</article>