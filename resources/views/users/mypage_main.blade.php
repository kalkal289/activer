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
                            <span class="page-back-btn" onClick="history.back()"><i class="fa-solid fa-arrow-left"></i></span>
                        
                            @include('users.mypage_common', [
                            'user' => $user,
                            'kind' => $kind,
                            ])
                            <div id="log"></div>
                            <div id="log2"></div>
                            
                            @if($user->id == Auth::id())
                                <div class="contents-create-btn-area">
                                    <a class="main-create-btn" href="{{ route('createMain') }}"><i class="fa-solid fa-star contents-create-icon-main contents-create-icon"></i> メインコンテンツを作成する</a>
                                    <a class="edit-category-btn" href="{{ route('editCategory') }}">マイカテゴリー設定</a>
                                </div>
                            @endif
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
                    
                    @include('parts.mypage_guide')
                    
                </div>
            </div>
            
            <script src="{{ asset('js/deleteConfirm.js') }}"></script>
            <script src="{{ asset('js/unfollowBtn.js') }}"></script>
            <script src="{{ asset('js/postMenuAppear.js') }}"></script>
            <script src="{{ asset('js/follow.js') }}" type="module"></script>
        
        </body>
    </x-app-layout>
</html