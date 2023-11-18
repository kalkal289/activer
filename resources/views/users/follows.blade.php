<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title>{{ ($kind == 0) ? "フォロー中 一覧" : "フォロワー 一覧" }}</title>
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
                            <div class="center-user-info-area">
                                <div class="center-user-info">
                                    
                                    @include('parts.profile_header', [
                                        'user' => $main_user,
                                        'kind' => 1,
                                    ])
                                    
                                    <div id="main-user-id" data-main-id="{{ $main_user->id }}" class="user-follow-info-area">
                                        <p class="user-follow-info">
                                            <a href="/followeds/{{ $main_user->id }}">フォロー中 <span id="followeds_count" class="follow-count">{{ $main_user->followeds()->count() }}</span></a>
                                        </p>
                                        <p class="user-follow-info">
                                            <a href="/followers/{{ $main_user->id }}">フォロワー <span id="followers_count" class="follow-count">{{ $main_user->followers()->count() }}</span></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="follow-list-title-area">
                                    <h2 id="title" class="follow-list-title"><i class="fa-solid fa-user-group"></i> {{ ($kind == 0) ? "フォロー中 一覧" : "フォロワー 一覧" }} 　</h2>
                                </div>
                                <div class="center-title-border"></div>
                            </div>
                            <div class="center-container">
                                <div class="center-user-list-area">
                                    @if(count($users) == 0)
                                        <p class="post-nothing">{{ ($kind == 0) ? "まだ誰もフォローしていません。" : "まだフォロワーはいません。" }}</p>
                                    @endif
                                    @foreach ($users as $user)
                                
                                        @include('parts.list_user_profile', ['user' => $user])
                                    
                                    @endforeach
                                    <div class="paginate paginate-style">{{ $users->links() }}</div>
                                </div>
                            </div>
                        </div>
                    </main>
                    <div class="guide-btn"  onclick="$('#side-bar').toggleClass('guide-up')"><i class="fa-solid fa-circle-info"></i></div>
                    <aside id="side-bar" class="side-bar">
                        <div class="guide-x-btn"  onclick="$('#side-bar').toggleClass('guide-up')"><i class="fa-solid fa-xmark"></i></div>
                        <div class="guide-container">
                            <h3 class="guide-title">【利用説明】</h3>
                            <h4 class="guide-sub-title">フォロー中一覧について</h4>
                            <ul class="guide-list">
                                @if($main_user->id == Auth::id())
                                    <li>あなたがフォローしているユーザーを見ることができます。</li>
                                    <li>新しい順に並んでおり、あなたが直近にフォローしたユーザーが一番上に表示されます。</li>
                                @else
                                    <li>上部に表示されたユーザーがフォローしているユーザーを見ることができます。</li>
                                    <li>新しい順に並んでおり、上部のユーザーが直近にフォローしたユーザーが一番上に表示されます。</li>
                                @endif
                            </ul>
                            <h4 class="guide-sub-title">フォロワー一覧について</h4>
                            <ul class="guide-list">
                                @if($main_user->id == Auth::id())
                                    <li>あなたのフォロワーを見ることができます。</li>
                                    <li>新しい順に並んでおり、あなたを直近にフォローしたユーザーが一番上に表示されます。</li>
                                @else
                                    <li>上部に表示されたユーザーのフォロワーを見ることができます。</li>
                                    <li>新しい順に並んでおり、上部のユーザーを直近にフォローしたユーザーが一番上に表示されます。</li>
                                @endif
                            </ul>
                            <h4 class="guide-sub-title">ページの切り替えについて</h4>
                            <ul class="guide-list">
                                <li>上部のプロフィールの「フォロー中」・「フォロワー」を押すことで表示を切り替えることができます。</li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
            
            <script src="{{ asset('js/unfollowBtn.js') }}"></script>
            <script src="{{ asset('js/followList.js') }}" type="module"></script>
            
        </body>
    </x-app-layout>
</html>