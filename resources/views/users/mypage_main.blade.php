<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>{{ $user->name }}のマイページ Main</title>
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

                            <div class="contents-create-btn-area">
                                <a class="main-create-btn" href="{{ route('createMain') }}">メインコンテンツを作成する</a>
                            </div>
                            <div class="center-container">
                                <div class="center-mypage-contents-area">
                                    @if(count($mains) == 0)
                                        <p class="post-nothing">まだメインコンテンツを作成していません。</p>
                                    @endif
                                    @foreach ($mains as $main)
                                    
                                    @include('parts.main_template', ['main' => $main,])
                                    
                                    @endforeach
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
        
        </body>
    </x-app-layout>
</html