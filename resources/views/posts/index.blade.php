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
            <div class="w-1/2 mx-auto">
                <h1>トップページ</h1>
                <div class="my-4">
                    <a href="/posts/create" class="p-4 rounded border-2 border-black">投稿</a>
                </div>
                <div class='posts'>
                    @foreach ($posts as $post)
                        <div class="border border-black rounded mt-10 p-4">
                            <div class="flex justify-between mx-auto">
                                <div>
                                    <div>
                                        <a href="/mypages/{{ $post->user_id }}" class="flex">
                                            <div class="w-10 h-10 border-1 border-black rounded-full">
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
                                            <span class="mr-4">{{ $usertag->name }}</span>
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
                            <p class='body'>{{ $post->content }}</p>
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
                            <p class='bigpost'>bigpost: {{ $post->is_big_post }}</p>
                            <p class='category'>カテゴリー名: {{ $post->category->name }}</p>
                            <p class='comments'>コメント数: {{ $post->comments->count() }}</p>
                            <p class='likes'>いいね数: {{ $post->likes->count() }}</p>
                            <small>投稿日: {{ $post->created_at }}</small>
                            <div class="text-center mx-auto my-2">
                                <a href="/posts/{{ $post->id }}" class="inline-block w-10/12 py-2 border border-black">詳細ページへ</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <div class="my-4">
                <form action="/" method="get">
                    <div class="flex flex-col text-center w-2/5 mx-auto">
                        <select name="type">
                            <option value="1" selected>投稿</option>
                            <option value="2">メインコンテンツ</option>
                            <option value="3">ストアコンテンツ</option>
                        </select>
                        <input type="text" name="keyword" placeholder="キーワードを入力">
                        <input type="submit" value="検索" class="p-2 border-2 border-black w-1/2 m-auto inline-block">
                    </div>
                </form>
            </div>
            <script src="{{ asset('js/deleteConfirm.js') }}"></script>
        </body>
    </x-app-layout>
</html>