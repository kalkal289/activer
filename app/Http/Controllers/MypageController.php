<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class MypageController extends Controller
{
    function mypageMain(User $user) {
        return view('users.mypage')->with([
            'user' => $user,
            'contents' => $user->mains,
            'kind' => 1,
        ]);
    }
    
    function mypagePost(User $user, Post $post) {
        return view('users.mypage')->with([
            'user' => $user,
            'posts' => $post->where('user_id', $user->id)->orderBy('created_at', 'DESC')->paginate(20),
            'kind' => 2,
        ]);
    }
    
    function mypageBigPost(User $user, Post $post) {
        return view('users.mypage')->with([
            'user' => $user,
            'posts' => $post->where('user_id', $user->id)->where('is_big_post', 1)->orderBy('created_at', 'DESC')->paginate(20),
            'kind' => 3,
        ]);
    }
    
    function mypageStore(User $user) {
        return view('users.mypage')->with([
            'user' => $user,
            'contents' => $user->stores,
            'kind' => 4,
        ]);
    }
}
