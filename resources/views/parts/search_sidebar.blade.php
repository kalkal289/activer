<aside class="side-bar">
    <div class="search-container">
        <div class="search-area">
            <h4 class="search-title"><i class="fa-solid fa-magnifying-glass"></i> 検索</h4>
            <select id="type_select" class="type-select" name="type" onChange="typeChange()">
                <option value="1" {{ (Request::routeIs('index', 'postFilter')) ? "selected" : "" }}>投稿</option>
                <option value="2" {{ (Request::routeIs('mainFilter')) ? "selected" : "" }}>メインコンテンツ</option>
                <option value="3" {{ (Request::routeIs('storeFilter')) ? "selected" : "" }}>ストアコンテンツ</option>
            </select>
            <form id="search_form" action="{{ (Request::routeIs('mainFilter')) ? "/mains/filter" : ((Request::routeIs('storeFilter')) ? "/stores/filter" : "/posts/filter") }}" method="GET" class="search-form">
                <input class="search-keyword" type="text" name="keyword" placeholder="キーワードを入力"  value="{{ $keyword }}" />
                <div class="search-checkbox flex">
                    <input id="checkbox_follow" class="checkbox-follow" type="checkbox" name="is_followed_user" {{ ($is_followed_user) ? "checked" : "" }} />
                    <label class="checkbox-label" for="checkbox_follow">フォローしている人のみ</label>
                </div>
                <div id="bigpost_checkbox" class="search-checkbox flex {{ (Request::routeIs('mainFilter','storeFilter')) ? 'hidden' : '' }}">
                    <input id="checkbox_big_post" class="checkbox-big-post" type="checkbox" name="is_big_post" {{ ($is_big_post) ? "checked" : "" }} />
                    <label class="checkbox-label" for="checkbox_big_post">ビッグポストのみ</label>
                </div>
                <input class="search-btn" type="submit" value="検索" />
            </form>
        </div>
    </div>
</aside>