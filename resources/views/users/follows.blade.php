<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title>{{ ($kind == 0) ? "フォロー中 一覧" : "フォロワー 一覧" }}</title>
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
                            <div class="center-user-info-area">
                                <div class="center-user-info">
                                    
                                    @include('parts.profile_header', [
                                        'user' => $main_user,
                                        'kind' => 1,
                                    ])
                                    
                                    <div class="user-follow-info-area">
                                        <p class="user-follow-info">
                                            <a href="/followeds/{{ $main_user->id }}">フォロー中 <span class="follow-count">{{ $main_user->followeds()->count() }}</span></a>
                                        </p>
                                        <p class="user-follow-info">
                                            <a href="/followers/{{ $main_user->id }}">フォロワー <span class="follow-count">{{ $main_user->followers()->count() }}</span></a>
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
                    <aside id="side" class="side-bar"></aside>
                </div>
            </div>
            
            <script src="{{ asset('js/unfollowBtn.js') }}"></script>
            
        </body>
    </x-app-layout>
</html>