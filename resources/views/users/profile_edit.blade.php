<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>プロフィール編集</title>
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
                            <div class="center-title-area">
                                <h1 class="center-title"><i class="fa-solid fa-user"></i> プロフィール編集 　</h1>
                            <div class="center-title-border"></div>
                            </div>
                            <div class="center-container">
                                <div class="center-contents-area">
                                    <form class="create-form" action="{{ route('updateProfile', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        @if ($errors->any())
                                            <div class="alert alert-danger create-alert">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="edit-profile-page-image">
                                            <a href="{{ route('mypageMain', ['user' => $user->id]) }}">
                                                @if($user->profile_image)
                                                    <img class="post-profile-img" src="{{ $user->profile_image }}" alt="プロフィール画像" />
                                                @else
                                                    <img class="post-profile-img" src="https://res.cloudinary.com/drs9gzes2/image/upload/v1695132757/kkrn_icon_user_14_evxlot.png" alt="プロフィール画像"/>
                                                @endif
                                            </a>
                                        </div>
                                        <label class="edit-profile-label" for="name">名前</label>
                                        <input id="name" class="edit-profile-title" type="text" name="user[name]" placeholder="名前" value="{{ (old('user.name')) ? old('user.name') : $user->name }}">
                                        <div class="text-count-area">
                                            <p id="title-count-message">現在 <span id="title-count" class="text-count">0</span>文字 / 50文字</p>
                                        </div>
                                        <label class="edit-profile-label" for="message">自己紹介文</label>
                                        <textarea id="message" class="edit-profile-body" rows="3" name="user[message]" placeholder="自己紹介文">{{ (old('user.message')) ? old('user.message') : $user->message }}</textarea>
                                        <div class="text-count-area">
                                            <p id="text-count-message">現在 <span id="text-count" class="text-count">0</span>文字 / 100文字</p>
                                        </div>
                                        <label class="edit-profile-label" for="image">プロフィール画像</label>
                                        <div class="edit-profile-image-area">
                                            <label class="create-image-label" for="image">○プロフィール画像変更○</label>
                                            <input class="create-image" type="file" id="image" name="image" accept="image/*" />
                                        </div>
                                        
                                        <label class="edit-profile-label" for="image">ユーザータグ（5つまで）</label>
                                        <div class="edit-user-tag-area">
                                            <p id="usertag-alert" class="text-red-500"></p>
                                            <div class="edit-user-tags">
                                                <?php $i = 0 ?>
                                                @foreach($user->usertags as $usertag)
                                                    <input id="tag{{ $i }}" class="edit-user-tag" type="text" name="tags[{{ $i }}]" placeholder="ユーザータグ{{ $i + 1 }}" value="{{ old('tag['.$i. ']') ? old('tag['.$i. ']') : $usertag->name }}" onChange="usertagAlert()">
                                                    <?php $i++ ?>
                                                @endforeach
                                                @for($i; $i < 5; $i++)
                                                    <input id="tag{{ $i }}" class="edit-user-tag" type="text" name="tags[{{ $i }}]" placeholder="ユーザータグ{{ $i + 1 }}" value="{{ old('tag['.$i. ']') }}" onChange="usertagAlert()">
                                                @endfor
                                            </div>
                                        </div>
                                        
                                        <input class="edit-profile-submit" type="submit" value="更新" onclick="return profileFormCheck()" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </main>
                    <aside class="side-bar"></aside>
                </div>
            </div>
            
            <script src="{{ asset('js/formCheck.js') }}"></script>
            <script src="{{ asset('js/strCount/profile.js') }}"></script>
            <script src="{{ asset('js/textareaHeight.js') }}"></script>
            
        </body>
    </x-app-layout>
</html>