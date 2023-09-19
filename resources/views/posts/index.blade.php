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
            
            <h1>トップページ</h1>
            <div class="my-4">
                <a href="route('create')" class="p-4 rounded border-2 border-black">投稿</a>
            </div>
            <div class='posts'>
                @foreach ($posts as $post)
                    <div class='post mt-10'>
                        <div class="w-10 h-10 border-1 border-black rounded-full">
                            @if($post->user->profile_image)
                                <img src="{{ $post->user->profile_image }}" alt="プロフィール画像"/>
                            @else
                                <img src="https://res.cloudinary.com/drs9gzes2/image/upload/v1695132757/kkrn_icon_user_14_evxlot.png" alt="プロフィール画像"/>
                            @endif
                        </div>
                        <h2 class='user-name'>{{ $post->user->name }}</h2>
                        <div>
                            @foreach ($post->user->usertags as $usertag)
                                <span class="mr-4">{{ $usertag->name }}</span>
                            @endforeach
                        </div>
                        <p class='body'>{{ $post->content }}</p>
                        @if($post->image1)
                            <img src="{{ $post->image1 }}" alt="画像が読み込めません。"/>
                            @if($post->image2)
                                <img src="{{ $post->image2 }}" alt="画像が読み込めません。"/>
                                @if($post->image3)
                                    <img src="{{ $post->image3 }}" alt="画像が読み込めません。"/>
                                    @if($post->image4)
                                        <img src="{{ $post->image4 }}" alt="画像が読み込めません。"/>
                                    @endif
                                @endif
                            @endif
                        @endif
                        <p class='category'>カテゴリー名: {{ $post->category->name }}</p>
                        <p class='comments'>コメント数: {{ $post->comments->count() }}</p>
                        <p class='likes'>いいね数: {{ $post->likes->count() }}</p>
                    </div>
                @endforeach
            </div>
            
            <div class="my-4">
                <form action="/" method="get">
                    <div class="flex flex-col text-center w-2/5 mx-auto">
                        <select name="type">
                            <option value="1" selected>投稿</option>
                            <option value="2">メインコンテンツ</option>
                            <option value="3">ストアコンテンツ</option>
                        </select>
                        <input type="text" placeholder="キーワードを入力">
                        <input type="submit" value="検索" class="p-2 border-2 border-black w-1/2 m-auto inline-block">
                    </div>
                </form>
            </div>
        </body>
    </x-app-layout>
</html>