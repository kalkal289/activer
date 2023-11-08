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
                        
                            @include('users.mypage_common', [
                            'user' => $user,
                            'kind' => $kind,
                            ])
                            
                            @if($user->id == Auth::id())
                                <div class="contents-create-btn-area">
                                    <a class="post-create-btn" href="{{ route('create') }}"><i class="fa-solid fa-pen contents-create-icon-post contents-create-icon"></i> 投稿する</a>
                                    <a class="edit-category-btn" href="{{ route('editCategory') }}">マイカテゴリー設定</a>
                                </div>
                            @endif
                            <div class="center-container">
                                <div class="center-mypage-contents-area">
                                    @if(count($posts) == 0)
                                        <p class="post-nothing">まだ{{ ($kind == 2) ? "ビッグ" : "" }}ポストを投稿をしていません。</p>
                                    @endif
                                    @foreach ($posts as $post)
                                    
                                    @include('parts.post_template', ['post' => $post,])
                                    
                                    @endforeach
                                    <div class="paginate paginate-style">{{ $posts->appends(request()->input())->links() }}</div>
                                </div>
                            </div>
                        </div>
                    </main>
                    <aside class="side-bar"></aside>
                </div>
            </div>
            
            <script src="{{ asset('js/deleteConfirm.js') }}"></script>
            <script src="{{ asset('js/unfollowBtn.js') }}"></script>
            <script src="{{ asset('js/postMenuAppear.js') }}"></script>
            <script src="{{ asset('js/like.js') }}" type="module"></script>
        
        </body>
    </x-app-layout>
</html>