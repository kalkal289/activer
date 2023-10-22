<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>ストアコンテンツ編集</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" />
    </head>
    <x-app-layout>
        <body>
            <div class="window">
                <div class="all-container">
                    <main>
                        <div class="center-area">
                            <div class="center-title-area store-border-color">
                                <h1 class="center-title store-text-color"><i class="fa-solid fa-store"></i> ストアコンテンツ編集 　</h1>
                            </div>
                            <div class="center-container">
                                <div class="center-contents-area">
                                    <form class="create-form" action="{{ route('updateStore', ['store' => $store->id]) }}" method="POST" enctype="multipart/form-data">
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
                                        <input type="hidden" name="store[user_id]" value="{{ Auth::id() }}" />
                                        <input id="title" class="create-store-title" type="text" name="store[title]" placeholder="タイトル" value="{{ (old('store.title')) ? old('store.title') : $store->title }}">
                                        <div class="text-count-area">
                                            <p id="title-count-message">現在 <span id="title-count" class="text-count">0</span>文字 / 50文字</p>
                                        </div>
                                        <textarea id="content" class="create-store-body" rows="4" name="store[content]" placeholder="ストアコンテンツの内容を書きましょう！">{{ (old('store.content')) ? old('store.content') : $store->content }}</textarea>
                                        <div class="text-count-area">
                                            <p id="text-count-message">現在 <span id="text-count" class="text-count">0</span>文字 / 500文字</p>
                                        </div>
                                        <select class="create-store-select" name="store[storecategory_id]">
                                            @foreach ($categories as $category)
                                                <option value={{ $category->id }} {{ ($category->id == $store->storecategory_id) ? "selected" : "" }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="create-store-image-area">
                                            <label class="create-image-label" for="image">○画像を4枚まで添付することができます○</label>
                                            @if($store->image1)
                                                <label class="create-image-label" for="image">※ファイルを選択しない場合、変更前の画像が受け継がれます。</label>
                                            @endif
                                            <input class="create-image" type="file" id="image" name="image[]" accept="image/*" multiple onChange="imagesTooMany()" />
                                        </div>
                                        <input class="create-store-submit" type="submit" value="作成" onclick="return contentFormCheck()" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </main>
                    <aside class="side-bar"></aside>
                </div>
            </div>
            
            <script src="{{ asset('js/formCheck.js') }}"></script>
            <script src="{{ asset('js/contentsStrCount.js') }}"></script>
            <script src="{{ asset('js/textareaHeight.js') }}"></script>
            
        </body>
    </x-app-layout>
</html>