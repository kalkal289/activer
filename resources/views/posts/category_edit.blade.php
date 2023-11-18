<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>マイカテゴリー設定</title>
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
                            <span class="page-back-btn" onClick="history.back()"><i class="fa-solid fa-arrow-left"></i></span>
                            <div class="center-title-area">
                                <h1 class="center-title">マイカテゴリー編集</h1>
                            </div>
                            <div class="center-container">
                                <div class="center-contents-area">
                                    @if ($errors->any())
                                        <div class="alert alert-danger create-alert">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <h2 class="category-edit-title">マイカテゴリー追加</h2>
                                    <form action="{{ route('storeCategory') }}" method="POST" class="mb-4">
                                        @csrf
                                        <input type="hidden" name="category[user_id]" value="{{ Auth::id() }}">
                                        <div class="category-create-area post-shadow-color">
                                            <input id="category-create-name" class="category-create-name" type="text" name="category[name]" placeholder="カテゴリー名を入力" value="{{ old('category.name') }}">
                                            <input class="category-create-submit rounded-r" type="submit" value="追加" onClick="return createFormCheck()">
                                        </div>
                                        <div class="text-count-area">
                                            <p id="text-count-message">現在 <span id="text-count" class="text-count">0</span>文字 / 30文字</p>
                                        </div>
                                    </form>
                                    <h2 class="category-edit-title">マイカテゴリー編集</h2>
                                    @if(count($categories) == 0)
                                        <p class="post-nothing">マイカテゴリーを作って投稿をまとめよう！！</p>
                                    @endif
                                    <ul>
                                        @foreach($categories as $category)
                                            <li class="category-item">
                                                <div id="category-show{{ $category->id }}">
                                                    <div class="category-create-area post-shadow-color">
                                                        <p class="category-edit-name">{{ $category->name }}</p>
                                                        <div class="flex">
                                                        <button class="category-btn category-edit-btn" onClick="categoryEditToggle({{ $category->id }})">編集</button>
                                                            <form action="/categories/{{ $category->id }}" id="deleteCategory{{ $category->id }}" method="post">
                                                                @csrf  
                                                                @method('DELETE')
                                                                <button class="category-btn category-delete-btn" type="button" onClick="deleteCategory({{ $category->id }})"><i class="fa-solid fa-trash"></i>削除</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <form action="{{ route('updateCategory', ['category' => $category->id]) }}" id="category-edit{{ $category->id }}" class="hidden" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="category-create-area store-shadow-color">
                                                        <input type="hidden" name="category[user_id]" value="{{ Auth::id() }}">
                                                        <input id="category-name{{ $category->id }}" class="category-create-name" type="text" name="category[name]" placeholder="カテゴリー名を入力" value="{{ old('category.name') ? old('category.name') : $category->name }}" onKeyUp="categoryStrCount({{ $category->id }})">
                                                        <div class="flex">
                                                            <input class="category-update-submit" type="submit" value="更新" onclick="return editFormCheck({{ $category->id }})">
                                                            <div class="category-edit-close-btn" onClick="categoryEditToggle({{ $category->id }})"><i class="fa-solid fa-xmark"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-count-area">
                                                        <p id="text-count-message{{ $category->id }}">現在 <span id="text-count{{ $category->id }}" class="text-count">0</span>文字 / 30文字</p>
                                                    </div>
                                                </form>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </main>
                    <div class="guide-btn"  onclick="$('#side-bar').toggleClass('guide-up')"><i class="fa-solid fa-circle-info"></i></div>
                    <aside id="side-bar" class="side-bar">
                        <div class="guide-x-btn"  onclick="$('#side-bar').toggleClass('guide-up')"><i class="fa-solid fa-xmark"></i></div>
                        <div class="guide-container">
                            <h3 class="guide-title">【利用説明】</h3>
                            <h4 class="guide-sub-title">マイカテゴリーについて</h4>
                            <ul class="guide-list">
                                <li>マイカテゴリーは投稿とメインコンテンツに設定することができます。</li>
                                <li>投稿をまとめたり、投稿とメインコンテンツを紐づけたりすることができます。</li>
                                <li>マイカテゴリーの数に制限はありません。</li>
                            </ul>
                            <h4 class="guide-sub-title">マイカテゴリー追加方法</h4>
                            <ul class="guide-list">
                                <li>「マイカテゴリー追加」の欄にカテゴリー名を記入し、「追加」ボタンを押すことでマイカテゴリーを追加できます。</li>
                                <li>マイカテゴリーの名前は30文字以内です。。</li>
                            </ul>
                            <h4 class="guide-sub-title">マイカテゴリー編集方法</h4>
                            <ul class="guide-list">
                                <li>「マイカテゴリー編集」から、登録したマイカテゴリーの編集・削除ができます。</li>
                                <li>編集したいマイカテゴリーの「編集」ボタンを押すことで編集できるようになります。</li>
                                <li>マイカテゴリーを編集する際、「更新」ボタンを押すことで変更が確定されます。</li>
                            </ul>
                            <h4 class="guide-sub-title">マイカテゴリー削除方法</h4>
                            <ul class="guide-list">
                                <li>削除したいマイカテゴリーの「削除」ボタンを押し、確認のポップアップで確定することで削除することができます。</li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
            <script src="{{ asset('js/categoryEdit.js') }}"></script>
        </body>
    </x-app-layout>

</html>