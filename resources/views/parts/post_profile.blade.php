<!--引数1：$post（一つのポスト）-->
<!--引数2: $kind（投稿は 'on'、メインとストアは ''）-->

<div class="{{ ($is_post) ? "post-profile" : "content-profile" }}">
    <div>
        <a href="{{ route('mypageMain', ['user' => $post->user->id]) }}">
            @if($post->user->profile_image)
                <img class="post-profile-img" src="{{ $post->user->profile_image }}" alt="プロフィール画像" />
            @else
                <img class="post-profile-img" src="https://res.cloudinary.com/drs9gzes2/image/upload/v1695132757/kkrn_icon_user_14_evxlot.png" alt="プロフィール画像"/>
            @endif
        </a>
    </div>
    <div class="post-user-info">
        <div class="post-user-name">
            <a href="{{ route('mypageMain', ['user' => $post->user->id]) }}">
                <h3>{{ $post->user->name }}</h3>
            </a>
        </div>
        <ul class="user-tags-list">
            @foreach ($post->user->usertags as $usertag)
                <li>
                    <a href="#">#{{ $usertag->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>