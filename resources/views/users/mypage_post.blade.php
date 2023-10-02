<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>トップページ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <body>
            <div class="w-1/2 mx-auto pb-10">
                <div class="flex justify-between mt-4">
                    <div class="flex">
                        <div class="w-16 h-16 border border-black rounded-full">
                            @if($user->profile_image)
                                <img src="{{ $user->profile_image }}" alt="プロフィール画像"/>
                            @else
                                <img src="https://res.cloudinary.com/drs9gzes2/image/upload/v1695132757/kkrn_icon_user_14_evxlot.png" alt="プロフィール画像"/>
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
                                <a href="/profile/edit/{{ $user->id }}" class="p-2">プロフィール編集</a>
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
                <div class="flex pb-6 border-b-2 border-black">
                    <p>
                        <a href="/followeds/{{ $user->id }}">フォロー中 {{ $user->followeds()->count() }}</a>
                    </p>
                    <p class="ml-4">
                        <a href="/followers/{{ $user->id }}">フォロワー {{ $user->followers()->count() }}</a>
                    </p>
                </div>
                <div class="flex justify-around border-b-2 border-black mb-4">
                    <a href="/mypages/{{ $user->id }}" class="w-1/4 py-2 text-center">Main</a>
                    <a href="/mypages/posts/{{ $user->id }}" class="w-1/4 py-2 text-center {{ ($kind == 0) ? "bg-gray-600 text-white" : "" }}">Post</a>
                    <a href="/mypages/big/{{ $user->id }}" class="w-1/4 py-2 text-center {{ ($kind == 1) ? "bg-gray-600 text-white" : "" }}">BigPost</a>
                    <a href="/mypages/store/{{ $user->id }}" class="w-1/4 py-2 text-center">Store</a>
                </div>
                
                <div class='contents mt-10'>
                    @if(count($posts) == 0)
                        <p class="text-center text-xl mt-10">投稿がありません。</p>
                    @endif
                    @foreach ($posts as $post)
                        <div class="border rounded mt-6 p-4 {{ ($post->is_big_post == 0) ? "border-black" : "border-yellow-600" }}">
                            <div class="flex justify-between mx-auto mb-2">
                                <div>
                                    <div>
                                        <a href="/mypages/{{ $post->user_id }}" class="flex">
                                            <div class="w-10 h-10 border border-black rounded-full">
                                                @if($post->user->profile_image)
                                                    <img src="{{ $post->user->profile_image }}" alt="プロフィール画像"/>
                                                @else
                                                    <img src="https://res.cloudinary.com/drs9gzes2/image/upload/v1695132757/kkrn_icon_user_14_evxlot.png" alt="プロフィール画像"/>
                                                @endif
                                            </div>
                                            <h2 class='user-name'>{{ $post->user->name }}</h2>
                                        </a>
                                    </div>
                                    <div>
                                        @foreach ($post->user->usertags as $usertag)
                                            <span class="mr-4 text-blue-400 text-sm">#{{ $usertag->name }}</span>
                                        @endforeach
                                    </div>
                                </div>
                                @if($post->user_id == Auth::id())
                                    <div>
                                        <form action="/posts/{{ $post->id }}" id="deletePost{{ $post->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onClick="deletePost({{ $post->id }})" class="z-10 p-2 border border-black">削除</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                            @if($post->is_big_post == 1)
                                <small>【ビッグポスト】</small>
                            @endif
                            <p class='body border-y border-black p-2 mb-2'>{{ $post->content }}</p>
                            @if($post->image1)
                                <div class="flex overflow-x-scroll">
                                    <img class="w-2/5" src="{{ $post->image1 }}" alt="画像が読み込めません。"/>
                                    @if($post->image2)
                                        <img class="w-2/5 ml-4" src="{{ $post->image2 }}" alt="画像が読み込めません。"/>
                                        @if($post->image3)
                                            <img class="w-2/5 ml-4" src="{{ $post->image3 }}" alt="画像が読み込めません。"/>
                                            @if($post->image4)
                                                <img class="w-2/5 ml-4" src="{{ $post->image4 }}" alt="画像が読み込めません。"/>
                                            @endif
                                        @endif
                                    @endif
                                </div>
                            @endif
                            <!--<p class='bigpost'>bigpost: { $post->is_big_post }}</p>-->
                            <div class="flex">
                                <p class='comments p-2'>
                                    <a href="/posts/{{ $post->id }}" class="inline-block p-2 border border-yellow-500 text-yellow-500">コメント: {{ $post->comments->count() }}</a>
                                </p>
                                <p class='likes p-2 ml-4'>
                                    @if($post->is_liked_by_auth_user())
                                        <a class='inline-block p-2 border border-pink-500 bg-pink-500 text-white' href="/unlike/{{ $post->id }}">いいね: {{ $post->likes()->count() }}</a>
                                    @else
                                        <a class='inline-block p-2 border border-pink-500 text-pink-500' href="/like/{{ $post->id }}">いいね: {{ $post->likes()->count() }}</a>
                                    @endif
                                </p>
                            </div>
                            <small class='category block'>カテゴリー名: {{ $post->category->name }}</small>
                            <small>投稿日: {{ $post->created_at }}</small>
                            <div class="text-center mx-auto my-2">
                                <a href="/posts/{{ $post->id }}" class="inline-block w-10/12 py-2 border border-black">詳細ページへ</a>
                            </div>
                        </div>
                    @endforeach
                    <div class="mp-4 fixed right-0 bottom-0 w-1/5 pb-20">
                        <div class="flex flex-col text-center w-4/5 mx-auto">
                            <h3 class="text-center text-xl font-bold">〈 検索 〉</h3>
                            <form id="search_form" action="/mypages/{{ ($kind == 0) ? "posts" : "big" }}/{{ $user->id }}/filter" method="GET" class="flex flex-col text-center mt-4">
                                <input type="text" name="keyword" placeholder="キーワードを入力" value="{{ $keyword }}">
                                <input type="submit" value="検索" class="p-2 border-2 border-black w-1/2 m-auto inline-block mt-4">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="paginate">
                {{ $posts->appends(request()->input())->links() }}
            </div>
        </body>
    </x-app-layout>
</html>