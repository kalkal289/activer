<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>プロフィール編集</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <body>
            <h1 class="text-center font-bold text-xl mt-4">プロフィール編集</h1>
            <div class="form-area">
                <form class="flex flex-col w-2/5 mx-auto" action="/mypages/profile/{{ Auth::id() }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-600 mb-1">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!--<p id="error-txt" class="text-red-600"></p>-->
                    <div class="w-16 h-16 border border-black rounded-full">
                        @if($user->profile_image)
                            <img src="{{ $user->profile_image }}" alt="プロフィール画像"/>
                        @else
                            <img src="https://res.cloudinary.com/drs9gzes2/image/upload/v1695132757/kkrn_icon_user_14_evxlot.png" alt="プロフィール画像"/>
                        @endif
                    </div>
                    <label for="name">名前</label>
                    <input type="text" id="name" name="user[name]" placeholder="名前（50文字以内）" value="{{ (old('user.name')) ? old('user.name') : $user->name }}">
                    <label for="message">自己紹介文</label>
                    <textarea id="message" rows="6" name="user[message]" placeholder="簡単な自己紹介文を書こう！（100文字以内）">{{ (old('user.message')) ? old('user.message') : $user->message }}</textarea>
                    <label for="image">プロフィール画像変更</label>
                    <input type="file" id="image" name="image" accept="image/*" class="mb-4">
                    <input type="submit" value="変更" onclick="return profileFormCheck()" class="w-1/2 mb-10 mx-auto p-4 text-center border-2 border-black">
                    
                </form>
            </div>
            <script src="{{ asset('js/formCheck.js') }}"></script>
            <script src="{{ asset('js/textareaHeight.js') }}"></script>
        </body>
    </x-app-layout>
</html>