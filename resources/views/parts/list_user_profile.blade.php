<!--引数： $user（一人のユーザー）-->

<article class="post user-list-shadow-color">
    
    @include('parts.profile_header', [
        'user' => $user,
        'kind' => 0,
    ])
    
    <div class="post-body">
        <p>
            <a href="{{ route('mypageMain', ['user' => $user->id]) }}">{!! nl2br($user->message) !!}</a>
        </p>
    </div>
</article>