<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>メインコンテンツ検索結果</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <body>
            <div class="w-1/2 mx-auto">
                <h1 class="text-center font-bolc text-2xl">【メインコンテンツ{{ ($is_followed_user) ? "・フォロー中のみ" : "" }}】</h1>
                <p class="text-center font-bolc text-2xl">{{ ($keyword) ? "「". $keyword. "」の検索結果" : "" }}</p>
                <div class="my-4">
                    <a href="/posts/create" class="p-4 rounded border-2 border-black">投稿</a>
                </div>
                <div class='posts'>
                    @if(count($mains) == 0)
                        <p class="text-center text-xl mt-10">メインコンテンツがありません(´；ω；`)</p>
                    @endif
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
                                    <div class="w-10 h-10 border border-black rounded-full">
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
            
            <div class="mp-4 fixed top-0 right-0 bottom-0 h-screen w-1/5 pt-40">
                <div class="flex flex-col text-center w-4/5 mx-auto">
                    <h3 class="text-center text-xl font-bold mb-4">〈 検索 〉</h3>
                    <select id="type_select" name="type" onChange="typeChange()">
                        <option value="1">投稿</option>
                        <option value="2" selected>メインコンテンツ</option>
                        <option value="3">ストアコンテンツ</option>
                    </select>
                    <form id="search_form" action="/mains/filter" method="GET" class="flex flex-col text-center mt-4">
                        <input type="text" name="keyword" placeholder="キーワードを入力" value="{{ $keyword }}">
                        <div class="flex mt-4">
                            <input id="is_followed_user" type="checkbox" name="is_followed_user" {{ ($is_followed_user) ? "checked" : "" }}>
                            <label for="is_followed_user">フォローしている人のみ</label>
                        </div>
                        <div id="bigpost_checkbox" class="flex mt-4 hiiden">
                            <input id="is_big_post" type="checkbox" name="is_big_post">
                            <label for="is_big_post">ビッグポストのみ</label>
                        </div>
                        <input type="submit" value="検索" class="p-2 border-2 border-black w-1/2 m-auto inline-block mt-4">
                    </form>
                </div>
            </div>
            
            <div class="paginate">
                {{ $mains->appends(request()->input())->links() }}
            </div>
            
            <script src="{{ asset('js/deleteConfirm.js') }}"></script>
            <script src="{{ asset('js/searchSelect.js') }}"></script>
        </body>
    </x-app-layout>
</html>