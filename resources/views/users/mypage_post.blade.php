<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>{{ $user->name }}のマイページ {{ ($kind == 1) ? "Post" : "Big Post" }}</title>
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
                        
                            @include('users.mypage_common', [
                            'user' => $user,
                            'kind' => $kind,
                            ])
                            
                            
                            <div class="contents-create-btn-area">
                                @if($user->id == Auth::id())
                                    <a class="post-create-btn" href="{{ route('create') }}"><i class="fa-solid fa-pen contents-create-icon-post contents-create-icon"></i> 投稿する</a>
                                @endif
                                <form action="{{ route('mypageCategoryFilter', ['user' => $user->id]) }}" class="category-filter-form">
                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                    <input type="hidden" name="kind" value="{{ $kind }}">
                                    <select class="category-filter-select" name="category_id">
                                        <option value="">【マイカテゴリー】</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $category_id ? "selected" : "" }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <input class="category-filter-submit" type="submit" value="絞り込む">
                                </form>
                            </div>
                            <div class="center-container">
                                <div class="center-mypage-contents-area">
                                    @if(count($posts) == 0)
                                        <p class="post-nothing">{{ ($kind == 1) ? "投稿" : "ビッグポスト" }}がありません。</p>
                                    @endif
                                    @foreach ($posts as $post)
                                    
                                    @include('parts.post_template', ['post' => $post,])
                                    
                                    @endforeach
                                    <div class="paginate paginate-style">{{ $posts->appends(request()->input())->links() }}</div>
                                </div>
                            </div>
                        </div>
                    </main>
                    
                    @include('parts.mypage_guide')
                    
                </div>
            </div>
            
            <script src="{{ asset('js/deleteConfirm.js') }}"></script>
            <script src="{{ asset('js/unfollowBtn.js') }}"></script>
            <script src="{{ asset('js/postMenuAppear.js') }}"></script>
            <script src="{{ asset('js/like.js') }}" type="module"></script>
            <script src="{{ asset('js/follow.js') }}" type="module"></script>
        
        </body>
    </x-app-layout>
</html>