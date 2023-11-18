<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>検索ページ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" />
    </head>
    <x-app-layout>
        <body>
            <div class="window">
                <div class="all-container">
                    <main>
                        <div class="center-area">
                            <span class="page-back-btn" onClick="history.back()"><i class="fa-solid fa-arrow-left"></i></span>
                            <div class="center-title-area">
                                <h1 class="center-title"><i class="fa-solid fa-magnifying-glass"></i> 検索ページ 　</h1>
                            </div>
                            <div class="center-container">
                                <div class="center-contents-area">
                                    <div class="search-page-container">
                                        <select id="type_select" class="type-select" name="type" onChange="typeChange()">
                                            <option value="1" selected>投稿</option>
                                            <option value="2">メインコンテンツ</option>
                                            <option value="3">ストアコンテンツ</option>
                                            <option value="4">ユーザー</option>
                                        </select>
                                        <form id="search_form" action="/posts/filter" method="GET" class="search-form">
                                            <input class="search-keyword" type="text" name="keyword" placeholder="キーワード　#タグ" />
                                            <div id="follow_checkbox" class="search-checkbox flex">
                                                <input id="checkbox_follow" class="checkbox-follow" type="checkbox" name="is_followed_user" />
                                                <label class="checkbox-label" for="checkbox_follow">フォローしている人のみ</label>
                                            </div>
                                            <div id="bigpost_checkbox" class="search-checkbox flex">
                                                <input id="checkbox_big_post" class="checkbox-big-post" type="checkbox" name="is_big_post" />
                                                <label class="checkbox-label" for="checkbox_big_post">ビッグポストのみ</label>
                                            </div>
                                            <input class="search-btn" type="submit" value="検索" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                    <aside class="side-bar"></aside>
                </div>
            </div>
            
            <script src="{{ asset('js/searchSelect.js') }}"></script>
        
        </body>
    </x-app-layout>
</html>