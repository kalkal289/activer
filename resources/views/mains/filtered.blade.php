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
            <div class="window">
                <div class="all-container">
                    <main>
                        <div class="center-area">
                            <div class="center-title-area main-border-color">
                                <h1 class="center-title main-text-color"><i class="fa-solid fa-star"></i> メインコンテンツ 　</h1>
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
                                    @if(count($mains) == 0)
                                        <p class="post-nothing">メインコンテンツがありません(´；ω；`)</p>
                                    @endif
                                    @foreach($mains as $main)
                                    
                                        @include('parts.main_template', ['main' => $main,])
                                    
                                    @endforeach
                                    <div class="paginate paginate-style">{{ $mains->appends(request()->input())->links() }}</div>
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