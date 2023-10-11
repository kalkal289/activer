<!--引数： $user（一人のユーザー）-->

<article class="post user-list-shadow-color">
    
    @include('parts.profile_header', [
        'user' => $user,
        'need_usertags_area' => '',
    ])
    
    <div class="post-body">
        <p>
            <a href="{{ route('mypageMain', ['user' => $user->id]) }}">{{ $user->message }}</a>
        </p>
    </div>
</article>