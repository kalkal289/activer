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
                    <p>フォロー中 {{ $user->followeds()->count() }}</p>
                    <p class="ml-4">フォロワー {{ $user->followers()->count() }}</p>
                </div>
                <div class="flex justify-around border-b-2 border-black mb-4">
                    <a href="/mypages/{{ $user->id }}" class="w-1/4 py-2 text-center">Main</a>
                    <a href="/mypages/posts/{{ $user->id }}" class="w-1/4 py-2 text-center">Post</a>
                    <a href="/mypages/big/{{ $user->id }}" class="w-1/4 py-2 text-center">BigPost</a>
                    <a href="/mypages/store/{{ $user->id }}" class="w-1/4 py-2 text-center bg-gray-600 text-white">Store</a>
                </div>
                
                @if($user->id == Auth::id())
                    <div>
                        <a href="/stores/create" class="inline-block border border-black p-2">ストアを追加する</a>
                    </div>
                @endif
                <div class='contents mt-10'>
                    @foreach($stores as $store)
                        <div class='content border border-black rounded my-2 p-4'>
                            <div class="flex justify-between">
                                <h2 class='title font-bold'>{{ $store->title }}</h2>
                                @if($store->user_id == Auth::id())
                                    <div class="flex">
                                        <div class="mr-2">
                                            <a href="/stores/{{ $store->id }}/edit" class="block p-2 border border-black">編集</a>
                                        </div>
                                        <div>
                                            <form action="/stores/{{ $store->id }}" id="deleteStore{{ $store->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onClick="deleteStore({{ $store->id }})" class="p-2 border border-black">削除</button>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <p class='body p-4 my-4'>{{ $store->content }}</p>
                            @if($store->image1)
                                <div class="flex overflow-x-scroll">
                                    <img class="w-2/5" src="{{ $store->image1 }}" alt="画像が読み込めません。"/>
                                    @if($store->image2)
                                        <img class="w-2/5 ml-4" src="{{ $store->image2 }}" alt="画像が読み込めません。"/>
                                        @if($store->image3)
                                            <img class="w-2/5 ml-4" src="{{ $store->image3 }}" alt="画像が読み込めません。"/>
                                            @if($store->image4)
                                                <img class="w-2/5 ml-4" src="{{ $store->image4 }}" alt="画像が読み込めません。"/>
                                            @endif
                                        @endif
                                    @endif
                                </div>
                            @endif
                            <div class="flex mt-4 justify-between">
                                <div>
                                    <p>カテゴリー: {{ $store->storecategory->name }}</p>
                                    <p>更新日: {{ $store->updated_at }}</p>
                                </div>
                                <div class="flex">
                                    <div class="w-10 h-10 border border-black rounded-full">
                                        @if($store->user->profile_image)
                                            <img src="{{ $store->user->profile_image }}" alt="プロフィール画像"/>
                                        @else
                                            <img src="https://res.cloudinary.com/drs9gzes2/image/upload/v1695132757/kkrn_icon_user_14_evxlot.png" alt="プロフィール画像"/>
                                        @endif
                                    </div>
                                    <div>
                                        <h3>{{ $store->user->name }}</h3>
                                        <div>
                                            @foreach ($store->user->usertags as $usertag)
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