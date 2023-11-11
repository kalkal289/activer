<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>{{ $user->name }}のマイページ Store</title>
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
                                    <a class="store-create-btn" href="{{ route('createStore') }}"><i class="fa-solid fa-store contents-create-icon-store contents-create-icon"></i> ストアコンテンツを作成する</a>
                                </div>
                            @endif
                            <div class="center-container">
                                <div class="center-mypage-contents-area">
                                    @if(count($stores) == 0)
                                        <p class="post-nothing">まだストアコンテンツを作成していません。</p>
                                    @endif
                                    @foreach ($stores as $store)
                                    
                                    @include('parts.store_template', ['store' => $store,])
                                    
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
            <script src="{{ asset('js/follow.js') }}" type="module"></script>
        
        </body>
    </x-app-layout>
</html