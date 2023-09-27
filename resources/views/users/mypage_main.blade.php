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
                    <a href="/mypages/{{ $user->id }}" class="w-1/4 py-2 text-center bg-gray-600 text-white">Main</a>
                    <a href="/mypages/posts/{{ $user->id }}" class="w-1/4 py-2 text-center">Post</a>
                    <a href="/mypages/big/{{ $user->id }}" class="w-1/4 py-2 text-center">BigPost</a>
                    <a href="/mypages/store/{{ $user->id }}" class="w-1/4 py-2 text-center">Store</a>
                </div>
                
                @if($user->id == Auth::id())
                    <div>
                        <a href="/mains/create" class="inline-block border border-black p-2">メインコンテンツを追加する</a>
                    </div>
                @endif
                <div class='contents mt-10'>
                    @foreach($mains as $main)
                        <div class='content border border-black rounded my-2 p-4'>
                            <div class="flex justify-between">
                                <h2 class='title font-bold'>{{ $main->title }}</h2>
                                @if($main->user_id == Auth::id())
                                    <div class="flex">
                                        <div class="mr-2">
                                            <a href="/mains/{{ $main->id }}/edit" class="block p-2 border border-black">編集</a>
                                        </div>
                                        <div>
                                            <form action="/mains/{{ $main->id }}" id="deleteMain{{ $main->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onClick="deleteMain({{ $main->id }})" class="p-2 border border-black">削除</button>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <p class='body p-4 my-4'>{{ $main->content }}</p>
                            @if($main->image1)
                                <div class="flex overflow-x-scroll">
                                    <img class="w-2/5" src="{{ $main->image1 }}" alt="画像が読み込めません。"/>
                                    @if($main->image2)
                                        <img class="w-2/5 ml-4" src="{{ $main->image2 }}" alt="画像が読み込めません。"/>
                                        @if($main->image3)
                                            <img class="w-2/5 ml-4" src="{{ $main->image3 }}" alt="画像が読み込めません。"/>
                                            @if($main->image4)
                                                <img class="w-2/5 ml-4" src="{{ $main->image4 }}" alt="画像が読み込めません。"/>
                                            @endif
                                        @endif
                                    @endif
                                </div>
                            @endif
                            <div class="flex mt-4 justify-between">
                                <div>
                                    <p>カテゴリー: {{ $main->category->name }}</p>
                                    <p>更新日: {{ $main->updated_at }}</p>
                                </div>
                                <div class="flex">
                                    <div class="w-10 h-10 border-1 border-black rounded-full">
                                        @if($main->user->profile_image)
                                            <img src="{{ $main->user->profile_image }}" alt="プロフィール画像"/>
                                        @else
                                            <img src="https://res.cloudinary.com/drs9gzes2/image/upload/v1695132757/kkrn_icon_user_14_evxlot.png" alt="プロフィール画像"/>
                                        @endif
                                    </div>
                                    <div>
                                        <h3>{{ $main->user->name }}</h3>
                                        <div>
                                            @foreach ($main->user->usertags as $usertag)
                                                <span class="mr-4 text-blue-400 text-sm">#{{ $usertag->name }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <script src="{{ asset('js/deleteConfirm.js') }}"></script>
        </body>
    </x-app-layout>
</html>