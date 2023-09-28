<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>トップページ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <body>
            <h1>ストア作成</h1>
            <div class="form-area">
                <form class="flex flex-col text-center w-2/5 mx-auto" action="/stores" method="POST" enctype="multipart/form-data">
                    @csrf
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
                    <input type="hidden" name="store[user_id]" value="{{ Auth::id() }}">
                    <input id="title" type="text" name="store[title]" placeholder="タイトル（30文字以内）" class="mb-2">
                    <textarea id="content" rows="6" name="store[content]" placeholder="今日何してた？（500文字以内）">{{ old('store.content') }}</textarea>
                    <select name="store[storecategory_id]" class="my-2">
                        @foreach ($categories as $category)
                            <option value={{ $category->id }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <label for="image">4枚まで画像を添付することができます。</label>
                    <input type="file" id="image" name="image[]" accept="image/*" multiple  onChange="imagesTooMany()" class="mb-4">
                    <p id="error-txt-image" class="text-red-600"></p>
                    <input type="submit" value="投稿" onclick="return contentFormCheck()" class="p-4 text-center border-2 border-black">
                    
                </form>
            </div>
            <script src="{{ asset('js/formCheck.js') }}"></script>
            <script src="{{ asset('js/textareaHeight.js') }}"></script>
        </body>
    </x-app-layout>
</html>