<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ユーザー検索結果</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <body>
            <div class="window">
                <div class="all-container">
                    <main>
                        <div class="center-area">
                            <span class="page-back-btn" onClick="history.back()"><i class="fa-solid fa-arrow-left"></i></span>
                            <div class="center-title-area">
                                <h1 class="center-title"><i class="fa-solid fa-user-group"></i> ユーザー検索 　</h1>
                                <ul class="filter-options">
                                    @if($keyword)
                                        <li>「 <span id="search-text" class="filter-keyword">{!! $new_keyword !!}</span> 」の検索結果</li>
                                    @endif
                                </ul>
                            </div>
                            <div class="center-container">
                                <div class="center-contents-area">
                                    @if(count($users) == 0)
                                        <p class="post-nothing">検索条件に合うユーザーがいません(´；ω；`)</p>
                                    @endif
                                    @foreach ($users as $user)
                                
                                        @include('parts.list_user_profile', ['user' => $user])
                                    
                                    @endforeach
                                    <div class="paginate paginate-style">{{ $users->appends(request()->input())->links() }}</div>
                                </div>
                            </div>
                        </div>
                    </main>
                    
                    <div class="guide-btn" onclick="$('#side-bar').toggleClass('guide-up')"><i class="fa-solid fa-magnifying-glass"></i></div>
                    
                    @include('parts.search_sidebar')
                
                </div>
            </div>
            
            <script src="{{ asset('js/searchSelect.js') }}"></script>
            <script src="{{ asset('js/unfollowBtn.js') }}"></script>
            <script src="{{ asset('js/follow.js') }}" type="module"></script>
            
        </body>
    </x-app-layout>
</html>