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
                    <aside class="side-bar"></aside>
                </div>
            </div>
            
            <script src="{{ asset('js/deleteConfirm.js') }}"></script>
            <script src="{{ asset('js/searchSelect.js') }}"></script>
            <script src="{{ asset('js/postMenuAppear.js') }}"></script>
            
        </body>
    </x-app-layout>
</html>