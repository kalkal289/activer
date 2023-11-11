<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('ニックネーム')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="ニックネームを入力" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <p id="name-count-message" class="text-right text-gray-500 text-sm">現在 <span id="name-count" class="text-count">0</span>文字 / <span id="name-limit">50</span>文字</p>
        </div>

        <!-- Account Name -->
        <div class="mt-4">
            <x-input-label for="account-name" :value="__('アカウント名（半角英数字のみ）')" />
            <x-text-input id="account-name" class="block mt-1 w-full" type="text" name="account_name" :value="old('account_name')" required autofocus autocomplete="account_name" placeholder="アカウント名を入力（重複不可）" />
            <x-input-error :messages="$errors->get('account_name')" class="mt-2" />
            <p id="account-name-count-message" class="text-right text-gray-500 text-sm">現在 <span id="account-name-count" class="text-count">0</span>文字 / <span id="account-name-limit">50</span>文字</p>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('メールアドレス')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="メールアドレスを入力（重複不可）" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('パスワード')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="パスワードを入力" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('パスワード再入力')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="もう一度パスワードを入力" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<script src="{{ asset('js/strCount/register.js') }}"></script>
