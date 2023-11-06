<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ストアコンテンツ検索結果</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <body>
            <div class="window">
                <div class="all-container">
                    <main>
                        <div class="center-area">
                            <div class="center-title-area store-border-color">
                                <h1 class="center-title store-text-color"><i class="fa-solid fa-store"></i> ストアコンテンツ 　</h1>
                                <ul class="filter-options">
                                    @if($is_followed_user)
                                        <li>{{ ($is_followed_user) ? "　フォロー中のみ　" : "" }}</li>
                                    @endif
                                    @if($keyword)
                                        <li>「 <span class="filter-keyword">{{ $keyword }}</span> 」の検索結果</li>
                                    @endif
                                </ul>
                            </div>
                            <div class="center-container">
                                <div class="center-contents-area">
                                    @if(count($stores) == 0)
                                        <p class="post-nothing">ストアコンテンツがありません(´；ω；`)</p>
                                    @endif
                                    @foreach($stores as $store)
                                    
                                        @include('parts.store_template', ['store' => $store,])
                                    
                                    @endforeach
                                    <div class="paginate paginate-style">{{ $stores->appends(request()->input())->links() }}</div>
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
            
        </body>
    </x-app-layout>
</html>