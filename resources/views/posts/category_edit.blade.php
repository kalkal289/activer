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
                                    <h2 class="category-edit-title">カテゴリー追加</h2>
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
                                    <h2 class="category-edit-title">カテゴリー編集</h2>
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
                    <aside class="side-bar"></aside>
                </div>
            </div>
            <script src="{{ asset('js/categoryEdit.js') }}"></script>
        </body>
    </x-app-layout>

</html>