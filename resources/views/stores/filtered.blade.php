<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ストア検索結果</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!--FontAwesome-->
        <script src="https://kit.fontawesome.com/68afbe7e1a.js" crossorigin="anonymous"></script>
    </head>
    <x-app-layout>
        <body>
            <div class="window">
                <div class="all-container">
                    <main>
                        <div class="center-area">
                            <div class="center-title-area">
                                <h1 class="center-title"><i class="fa-solid fa-store text-blue-300"></i> ストア{{ ($is_followed_user) ? "　フォロー中のみ" : "" }} 　</h1>
                                <div class="center-title-border"></div>
                            </div>
                            <div class="center-container">
                                <div class="center-contents-area">
                                    @if(count($stores) == 0)
                                        <p class="post-nothing">ストアがありません(´；ω；`)</p>
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
            
        </body>
    </x-app-layout>
</html>