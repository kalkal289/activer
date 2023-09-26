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
                <div class="flex justify-between mt-4">
                    <div class="flex">
                        <div class="w-16 h-16 border-1 border-black rounded-full">
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
                                <a href="/follow/{{ $user->id }}" class="p-2">フォロー</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="p-4 my-4">
                    <p>{{ $user->message }}</p>
                </div>
                <div class="flex pb-6 border-b-2 border-black">
                    <p>フォロー中 {{ $user->followeds()->count() }}</p>
                    <p class="ml-4">フォロワー {{ $user->followers()->count() }}</p>
                </div>
                <div class="flex justify-around border-b-2 border-black mb-4">
                    @if($kind == 2)
                        <a href="/mypages/{{ $user->id }}" class="w-1/4 py-2 text-center">Main</a>
                        <a href="/mypages/posts/{{ $user->id }}" class="w-1/4 py-2 text-center bg-gray-600 text-white">Post</a>
                        <a href="/mypages/big/{{ $user->id }}" class="w-1/4 py-2 text-center">BigPost</a>
                        <a href="/mypages/store/{{ $user->id }}" class="w-1/4 py-2 text-center">Store</a>
                    @else
                        <a href="/mypages/{{ $user->id }}" class="w-1/4 py-2 text-center">Main</a>
                        <a href="/mypages/posts/{{ $user->id }}" class="w-1/4 py-2 text-center">Post</a>
                        <a href="/mypages/big/{{ $user->id }}" class="w-1/4 py-2 text-center bg-gray-600 text-white">BigPost</a>
                        <a href="/mypages/store/{{ $user->id }}" class="w-1/4 py-2 text-center">Store</a>
                    @endif
                </div>
                <div class='contents mt-10'>
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
        </body>
    </x-app-layout>
</html>