<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ストア検索結果</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <body>
            <div class="w-1/2 mx-auto">
                <h1 class="text-center font-bolc text-2xl">【ストア{{ ($is_followed_user) ? "・フォロー中のみ" : "" }}】</h1>
                <p class="text-center font-bolc text-2xl">{{ ($keyword) ? "「". $keyword. "」の検索結果" : "" }}</p>
                <div class="my-4">
                    <a href="/posts/create" class="p-4 rounded border-2 border-black">投稿</a>
                </div>
                <div class='posts'>
                    @if(count($stores) == 0)
                        <p class="text-center text-xl mt-10">ストアがありません(´；ω；`)</p>
                    @endif
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
            
            <div class="mp-4 fixed top-0 right-0 bottom-0 h-screen w-1/5 pt-40">
                <div class="flex flex-col text-center w-4/5 mx-auto">
                    <h3 class="text-center text-xl font-bold mb-4">〈 検索 〉</h3>
                    <select id="type_select" name="type" onChange="typeChange()">
                        <option value="1">投稿</option>
                        <option value="2">メインコンテンツ</option>
                        <option value="3" selected>ストアコンテンツ</option>
                    </select>
                    <form id="search_form" action="/stores/filter" method="GET" class="flex flex-col text-center mt-4">
                        <input type="text" name="keyword" placeholder="キーワードを入力" value="{{ $keyword }}">
                        <div class="flex mt-4">
                            <input id="is_followed_user" type="checkbox" name="is_followed_user" {{ ($is_followed_user) ? "checked" : "" }}>
                            <label for="is_followed_user">フォローしている人のみ</label>
                        </div> 
                        <div id="bigpost_checkbox" class="flex mt-4 hidden">
                            <input id="is_big_post" type="checkbox" name="is_big_post">
                            <label for="is_big_post">ビッグポストのみ</label>
                        </div>
                        <input type="submit" value="検索" class="p-2 border-2 border-black w-1/2 m-auto inline-block mt-4">
                    </form>
                </div>
            </div>
            
            <div class="paginate">
                {{ $stores->appends(request()->input())->links() }}
            </div>
            
            <script src="{{ asset('js/deleteConfirm.js') }}"></script>
            <script src="{{ asset('js/searchSelect.js') }}"></script>
        </body>
    </x-app-layout>
</html>