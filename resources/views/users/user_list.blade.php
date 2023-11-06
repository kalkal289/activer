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
                            <div class="center-title-area">
                                <h1 class="center-title"><i class="fa-solid fa-user-group"></i> ユーザー検索 　</h1>
                                <ul class="filter-options">
                                    @if($keyword)
                                        <li>「 <span id="search-text" class="filter-keyword">{{ $keyword }}</span> 」の検索結果</li>
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
                    
                    @include('parts.search_sidebar')
                
                </div>
            </div>
            
            <script src="{{ asset('js/searchSelect.js') }}"></script>
            <script src="{{ asset('js/unfollowBtn.js') }}"></script>
            
        </body>
    </x-app-layout>
</html>