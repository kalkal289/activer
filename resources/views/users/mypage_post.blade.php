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
            <div class="w-1/2 mx-auto py-4">
                
                @include('users.mypage_common', [
                    'user' => $user,
                    'kind' => $kind,
                ])
                
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
                                            <div>
                                                @if($post->user->profile_image)
                                                    <img class="w-10 h-10 border border-black rounded-full" src="{{ $post->user->profile_image }}" alt="プロフィール画像"/>
                                                @else
                                                    <img class="w-10 h-10 border border-black rounded-full" src="https://res.cloudinary.com/drs9gzes2/image/upload/v1695132757/kkrn_icon_user_14_evxlot.png" alt="プロフィール画像"/>
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