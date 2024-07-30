<aside id="side-bar" class="side-bar">
    <div class="guide-x-btn"  onclick="$('#side-bar').toggleClass('guide-up')"><i class="fa-solid fa-xmark"></i></div>
    <div class="search-container">
        <div class="search-area">
            <h4 class="search-title"><i class="fa-solid fa-magnifying-glass"></i> 検索</h4>
            <select id="type_select" class="type-select" name="type" onChange="typeChange()">
                <option value="1" {{ Request::routeIs('index', 'postFilter') ? "selected" : "" }}>投稿</option>
                @if(Auth::guest())
                    <option disabled="disabled">メインコンテンツ<br>(ログイン時のみ選択可)</option>
                    <option disabled="disabled">ストアコンテンツ<br>(ログイン時のみ選択可)</option>
                    <option disabled="disabled">ユーザー<br>(ログイン時のみ選択可)</option>
                @else
                    <option value="2" {{ Request::routeIs('mainFilter') ? "selected" : "" }}>メインコンテンツ</option>
                    <option value="3" {{ Request::routeIs('storeFilter') ? "selected" : "" }}>ストアコンテンツ</option>
                    <option value="4" {{ Request::routeIs('userFilter') ? "selected" : "" }}>ユーザー</option>
                @endif
            </select>
            <form id="search_form" action="{{ Request::routeIs('mainFilter') ? "/mains/filter" : (Request::routeIs('storeFilter') ? "/stores/filter" : (Request::routeIs('userFilter') ? "/users/filter" : "/posts/filter" )) }}" method="GET" class="search-form">
                <input id="search-keyword" class="search-keyword" type="text" name="keyword" placeholder="キーワード （#タグ）"  value="{{ $keyword }}" />
                @if(Auth::guest())
                    <div id="follow_checkbox" class="search-checkbox flex">
                        <input id="checkbox_follow" class="checkbox-follow" type="checkbox" name="is_followed_user" {{ ($is_followed_user) ? "checked" : "" }} disabled />
                        <label class="checkbox-label text-gray" for="checkbox_follow">フォローしている人のみ<br>(ログイン時のみ選択可)</label>
                    </div>
                @else
                    <div id="follow_checkbox" class="search-checkbox flex">
                        <input id="checkbox_follow" class="checkbox-follow" type="checkbox" name="is_followed_user" {{ ($is_followed_user) ? "checked" : "" }} />
                        <label class="checkbox-label" for="checkbox_follow">フォローしている人のみ</label>
                    </div>
                @endif
                <div id="bigpost_checkbox" class="search-checkbox flex {{ !Request::routeIs('index', 'postFilter') ? 'hidden' : '' }}">
                    <input id="checkbox_big_post" class="checkbox-big-post" type="checkbox" name="is_big_post" {{ ($is_big_post) ? "checked" : "" }} />
                    <label class="checkbox-label" for="checkbox_big_post">ビッグポストのみ</label>
                </div>
                <input class="search-btn" type="submit" value="検索" />
            </form>
        </div>
    </div>
</aside>