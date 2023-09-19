<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>トップページ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <body>
            
            <h1>Blog Name</h1>
            <div class='posts'>
                @foreach ($posts as $post)
                    <div class='post'>
                        <h2 class='user-name'>{{ $post->user->name }}</h2>
                        <div>
                            @foreach ($usertags as $usertag)
                                <span class="mr-4">{{ $usertag }}</span>
                            @endforeach
                        </div>
                        <p class='body'>{{ $post->content }}</p>
                        <p class='category'>{{ $post->category->name }}</p>
                        <p class='comments'>{{ $post->comments->count() }}</p>
                        <p class='likes'>{{ $post->likes->count() }}</p>
                    </div>
                @endforeach
            </div>
            
        </body>
    </x-app-layout>
</html>