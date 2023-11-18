<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>{{ $user->name }}がいいねした投稿一覧</title>
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
                            <div class="center-title-area like-posts-title">
                                <a href="{{ route('mypageMain', ['user' => $user->id]) }}">
                                    @if($user->profile_image)
                                        <img class="post-profile-img" src="{{ $user->profile_image }}" alt="プロフィール画像" />
                                    @else
                                        <img class="post-profile-img" src="https://res.cloudinary.com/drs9gzes2/image/upload/v1695132757/kkrn_icon_user_14_evxlot.png" alt="プロフィール画像"/>
                                    @endif
                                </a>
                                <h1 class="center-title"><a href="{{ route('mypageMain', ['user' => $user->id]) }}">{{ $user->name }}</a> のいいね一覧</h1>
                            </div>
                            <div class="center-container">
                                <div class="center-contents-area">
                                    @if(count($posts) == 0)
                                        <p class="post-nothing">まだ投稿をいいねしていません。</p>
                                    @endif
                                    @foreach($posts as $post)
                                    
                                        @include('parts.post_template', ['post' => $post,])
                                    
                                    @endforeach
                                    <div class="paginate paginate-style">{{ $posts->appends(request()->input())->links() }}</div>
                                </div>
                            </div>
                        </div>
                    </main>
                    <div class="guide-btn"  onclick="$('#side-bar').toggleClass('guide-up')"><i class="fa-solid fa-circle-info"></i></div>
                    <aside id="side-bar" class="side-bar">
                        <div class="guide-x-btn"  onclick="$('#side-bar').toggleClass('guide-up')"><i class="fa-solid fa-xmark"></i></div>
                        <div class="guide-container">
                            <h3 class="guide-title">【利用説明】</h3>
                            <h4 class="guide-sub-title">このページについて</h4>
                            <ul class="guide-list">
                                @if($user->id == Auth::id())
                                    <li>あなたがいいねした投稿を見ることができます。</li>
                                    <li>新しい順に並んでおり、あなたが直近にいいねした投稿が一番上に表示されます。</li>
                                @else
                                    <li>タイトルに表示されたユーザーがいいねした投稿を見ることができます。</li>
                                    <li>新しい順に並んでおり、タイトルに表示されたユーザーが直近にいいねした投稿が一番上に表示されます。</li>
                                @endif
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
            
            <script src="{{ asset('js/deleteConfirm.js') }}"></script>
            <script src="{{ asset('js/searchSelect.js') }}"></script>
            <script src="{{ asset('js/postMenuAppear.js') }}"></script>
            <script src="{{ asset('js/like.js') }}" type="module"></script>
            
        </body>
    </x-app-layout>
</html>