<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>投稿検索結果</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <body>
            <div class="window">
                <div class="all-container">
                    <main>
                        <div class="center-area">
                            <div class="center-title-area">
                                <h1 class="center-title"><i class="fa-solid fa-pen text-bg-orange-300"></i> 投稿 　</h1>
                                <ul class="filter-options">
                                    @if($is_followed_user || $is_big_post)
                                        <li>{{ ($is_followed_user) ? "　フォロー中のみ　" : "" }}{{ ($is_big_post) ? "　ビッグポストのみ　" : "" }}</li>
                                    @endif
                                    @if($keyword)
                                        <li>「 <span id="search-text" class="filter-keyword">{!! $new_keyword !!}</span> 」の検索結果</li>
                                    @endif
                                </ul>
                            </div>
                            <div class="center-container">
                                <div class="center-contents-area">
                                    @if(count($posts) == 0)
                                        <p class="post-nothing">投稿がありません(´；ω；`)</p>
                                    @endif
                                    @foreach($posts as $post)
                                    
                                        @include('parts.post_template', ['post' => $post,])
                                    
                                    @endforeach
                                    <div class="paginate paginate-style">{{ $posts->appends(request()->input())->links() }}</div>
                                </div>
                            </div>
                        </div>
                    </main>
                    
                    @include('parts.search_sidebar')
                
                </div>
            </div>
            
            <script src="{{ asset('js/deleteConfirm.js') }}"></script>
            <script src="{{ asset('js/searchSelect.js') }}"></script>
            <script src="{{ asset('js/postMenuAppear.js') }}"></script>
            <script src="{{ asset('js/like.js') }}" type="module"></script>
            
        </body>
    </x-app-layout>
</html>