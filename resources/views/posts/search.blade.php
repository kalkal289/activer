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
                                            @if(Auth::guest())
                                                <option disabled="disabled">メインコンテンツ<br>(ログイン時のみ選択可)</option>
                                                <option disabled="disabled">ストアコンテンツ<br>(ログイン時のみ選択可)</option>
                                                <option disabled="disabled">ユーザー<br>(ログイン時のみ選択可)</option>
                                            @else
                                                <option value="2">メインコンテンツ</option>
                                                <option value="3">ストアコンテンツ</option>
                                                <option value="4">ユーザー</option>
                                            @endif
                                        </select>
                                        <form id="search_form" action="/posts/filter" method="GET" class="search-form">
                                            <input class="search-keyword" type="text" name="keyword" placeholder="キーワード （#タグ）" />
                                            @if(Auth::guest())
                                                <div id="follow_checkbox" class="search-checkbox flex">
                                                    <input id="checkbox_follow" class="checkbox-follow" type="checkbox" disabled />
                                                    <label class="checkbox-label text-gray" for="checkbox_follow">フォローしている人のみ<br>(ログイン時のみ選択可)</label>
                                                </div>
                                            @else
                                                <div id="follow_checkbox" class="search-checkbox flex">
                                                    <input id="checkbox_follow" class="checkbox-follow" type="checkbox" name="is_followed_user" {{ ($is_followed_user) ? "checked" : "" }} />
                                                    <label class="checkbox-label" for="checkbox_follow">フォローしている人のみ</label>
                                                </div>
                                            @endif
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
                    <div class="guide-btn"  onclick="$('#side-bar').toggleClass('guide-up')"><i class="fa-solid fa-circle-info"></i></div>
                    <aside id="side-bar" class="side-bar">
                        <div class="guide-x-btn"  onclick="$('#side-bar').toggleClass('guide-up')"><i class="fa-solid fa-xmark"></i></div>
                        <div class="guide-container">
                            <h3 class="guide-title">【利用説明】</h3>
                            <h4 class="guide-sub-title">検索方法</h4>
                            <ul class="guide-list">
                                <li>最初に調べたいものを「投稿」「メインコンテンツ」「ストアコンテンツ」「ユーザー」の中から選択してください。</li>
                                <li>投稿とユーザーはタグも同時に検索することができます。</li>
                                <li>キーワードとタグはいくつでも同時に検索することができます。</li>
                                <li>キーワードかタグが複数ある場合は、全てを含むものが検索されます。</li>
                                <li>「フォローしている人のみ」にチェックを入れることで、検索範囲があなたが現在フォローしている人に限定されます。</li>
                                <li>投稿検索に限り、「ビッグポストのみ」にチェックを入れることで、検索範囲がビッグポストに限定されます。</li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
            
            <script src="{{ asset('js/searchSelect.js') }}"></script>
        
        </body>
    </x-app-layout>
</html>