<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>検索ページ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <body>
            <div class="w-1/2 mx-auto">
                <h1>検索ページ</h1>
                <div class="my-4">
                    <a href="/posts/create" class="p-4 rounded border-2 border-black">投稿</a>
                </div>
                <div class="flex flex-col text-center w-1/2 mx-auto">
                    <h3 class="text-center text-xl font-bold mb-4">〈 検索 〉</h3>
                    <select id="type_select" name="type" onChange="typeChange()">
                        <option value="1" selected>投稿</option>
                        <option value="2">メインコンテンツ</option>
                        <option value="3">ストアコンテンツ</option>
                    </select>
                    <form id="search_form" action="/posts/filter" method="GET" class="flex flex-col text-center mt-4">
                        <input type="text" name="keyword" placeholder="キーワードを入力">
                        <div class="flex mt-4">
                            <input type="checkbox" name="is_followed_user">
                            <label>フォローしている人のみ</label>
                        </div>
                        <div id="bigpost_checkbox" class="flex mt-4">
                            <input type="checkbox" name="is_big_post">
                            <label>ビッグポストのみ</label>
                        </div>
                        <input type="submit" value="検索" class="p-2 border-2 border-black w-1/2 m-auto inline-block mt-4">
                    </form>
                </div>
            </div>
            
            <script src="{{ asset('js/searchSelect.js') }}"></script>
        </body>
    </x-app-layout>
</html>