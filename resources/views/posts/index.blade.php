<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>トップページ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" />
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
                                <h1 class="center-title">トップページ</h1>
                            </div>
                            <div class="center-container">
                                <div class="center-contents-area">
                                    @if(count($posts) == 0)
                                        <p class="post-nothing">投稿がありません(´；ω；`)</p>
                                    @endif
                                    @foreach ($posts as $post)
                                    
                                        @include('parts.post_template', ['post' => $post,])
                                    
                                    @endforeach
                                    <div class="paginate paginate-style">{{ $posts->appends(request()->input())->links() }}</div>
                                </div>
                            </div>
                        </div>
                    </main>
                    
                    @include('parts.search_sidebar', [
                        'is_followed_user' => '',
                        'is_big_post' => '',
                        'keyword' => '',
                    ])
                
                </div>
            </div>
            
            <script src="{{ asset('js/deleteConfirm.js') }}"></script>
            <script src="{{ asset('js/searchSelect.js') }}"></script>
            
        </body>
    </x-app-layout>
</html>
