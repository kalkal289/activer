<div class="flex justify-between">
    <div class="flex">
        <div>
            @if($user->profile_image)
                <img class="w-10 h-10 border border-black rounded-full" src="{{ $user->profile_image }}" alt="プロフィール画像"/>
            @else
                <img class="w-10 h-10 border border-black rounded-full" src="https://res.cloudinary.com/drs9gzes2/image/upload/v1695132757/kkrn_icon_user_14_evxlot.png" alt="プロフィール画像"/>
            @endif
        </div>
        <div>
            <h1 class="font-bold">{{ $user->name }}</h1>
            <p>@ {{ $user->account_name }}</p>
            <div>
                @foreach ($user->usertags as $usertag)
                    <span class="mr-4 text-blue-400">#{{ $usertag->name }}</span>
                @endforeach
            </div>
        </div>
    </div>
    <div>
        <div class="border border-black rounded mt-6 mr-6">
            @if($user->id == Auth::id())
                <a href="/mypages/profile/{{ Auth::id() }}" class="p-2">プロフィール編集</a>
            @else
                @if($user->is_followed_by_auth_user())
                    <a href="/unfollow/{{ $user->id }}" class="p-2">フォロー解除</a>
                @else
                    <a href="/follow/{{ $user->id }}" class="p-2">フォロー</a>
                @endif
            @endif
        </div>
    </div>
</div>
<div class="p-4 my-4">
    <p>{{ $user->message }}</p>
</div>
<div class="flex justify-between pb-6 border-b-2 border-black">
    <div class="flex">
        <p>
            <a href="/followeds/{{ $user->id }}">フォロー中 {{ $user->followeds()->count() }}</a>
        </p>
        <p class="ml-4">
            <a href="/followers/{{ $user->id }}">フォロワー {{ $user->followers()->count() }}</a>
        </p>
    </div>
    <div class="mr-10">
        <a href="/mypages/likes/{{ $user->id }}">いいねした投稿一覧</a>
    </div>
</div>
<div class="flex justify-around border-b-2 border-black mb-4">
    <a href="/mypages/{{ $user->id }}" class="w-1/4 py-2 text-center {{ ($kind == 0) ? "bg-gray-600 text-white" : "" }}">Main</a>
    <a href="/mypages/posts/{{ $user->id }}" class="w-1/4 py-2 text-center {{ ($kind == 1) ? "bg-gray-600 text-white" : "" }}">Post</a>
    <a href="/mypages/big/{{ $user->id }}" class="w-1/4 py-2 text-center {{ ($kind == 2) ? "bg-gray-600 text-white" : "" }}">BigPost</a>
    <a href="/mypages/store/{{ $user->id }}" class="w-1/4 py-2 text-center {{ ($kind == 3) ? "bg-gray-600 text-white" : "" }}">Store</a>
</div>