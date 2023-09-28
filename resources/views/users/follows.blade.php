<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>{{ ($kind == 0) ? "フォロー中 一覧" : "フォロワー 一覧" }}</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <body>
            <div class="w-1/2 mx-auto">
                
                
                <div class="flex justify-between mx-auto my-2">
                    <div>
                        <div class="flex">
                            <div class="w-10 h-10 border border-black rounded-full">
                                <a href="/mypages/{{ $main_user->id }}">
                                    @if($main_user->profile_image)
                                        <img src="{{ $main_user->profile_image }}" alt="プロフィール画像"/>
                                    @else
                                        <img src="https://res.cloudinary.com/drs9gzes2/image/upload/v1695132757/kkrn_icon_user_14_evxlot.png" alt="プロフィール画像"/>
                                    @endif
                                </a>
                            </div>
                            <div>
                                <h2 class='user-name'>
                                    <a href="/mypages/{{ $main_user->id }}">{{ $main_user->name }}</a>
                                </h2>
                                <div>
                                    @foreach ($main_user->usertags as $usertag)
                                        <span class="mr-4 text-blue-400 text-sm">#{{ $usertag->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="flex mt-2">
                            <p>
                                <a href="/followeds/{{ $main_user->id }}">フォロー中 {{ $main_user->followeds()->count() }}</a>
                            </p>
                            <p class="ml-4">
                                <a href="/followers/{{ $main_user->id }}">フォロワー {{ $main_user->followers()->count() }}</a>
                            </p>
                        </div>
                    </div>
                    @if($main_user->id != Auth::id())
                        <div class="mt-6 mr-6">
                            @if($main_user->is_followed_by_auth_user())
                                <a href="/unfollow/{{ $main_user->id }}" class="border border-black rounded p-2">フォロー解除</a>
                            @else
                                <a href="/follow/{{ $main_user->id }}" class="border border-black rounded p-2">フォロー</a>
                            @endif
                        </div>
                    @endif
                </div>
                
                <h1 class="text-center my-4 pt-2 border-t border-black font-bold text-lg">{{ ($kind == 0) ? "フォロー中 一覧" : "フォロワー 一覧" }}</h1>
                <div class='users pb-10'>
                    @foreach ($users as $user)
                        <div class="border rounded mt-6 p-2 border-black">
                            <div class="flex justify-between mx-auto">
                                <div class="flex">
                                    <div class="w-10 h-10 border border-black rounded-full">
                                        <a href="/mypages/{{ $user->id }}" class="flex">
                                            @if($user->profile_image)
                                                <img src="{{ $user->profile_image }}" alt="プロフィール画像"/>
                                            @else
                                                <img src="https://res.cloudinary.com/drs9gzes2/image/upload/v1695132757/kkrn_icon_user_14_evxlot.png" alt="プロフィール画像"/>
                                            @endif
                                        </a>
                                    </div>
                                    <div>
                                        <h2 class='user-name'>
                                            <a href="/mypages/{{ $user->id }}">{{ $user->name }}</a>
                                        </h2>
                                        <div>
                                            @foreach ($user->usertags as $usertag)
                                                <span class="mr-4 text-blue-400 text-sm">#{{ $usertag->name }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @if($user->id != Auth::id())
                                    <div class="mr-6 my-auto">
                                        @if($user->is_followed_by_auth_user())
                                            <a href="/unfollow/{{ $user->id }}" class="p-2 border border-black rounded">フォロー解除</a>
                                        @else
                                            <a href="/follow/{{ $user->id }}" class="p-2 border border-black rounded">フォロー</a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                            <div class="pt px-2">
                                <p>
                                    <a href="/mypages/{{ $user->id }}" class="max-h-8">{{ $user->message }}</a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="paginate">
                {{ $users->links() }}
            </div>
        </body>
    </x-app-layout>
</html>