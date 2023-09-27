<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Main;
use App\Models\Store;
use App\Models\Post;
use Illuminate\Http\Request;

class MypageController extends Controller
{
    function mypageMain(User $user, Main $main) {
        return view('users.mypage_main')->with([
            'user' => $user,
            'mains' => $main->where('user_id', $user->id)->orderBy('updated_at', 'DESC')->get(),
        ]);
    }
    
    function mypagePost(User $user, Post $post) {
        return view('users.mypage_post')->with([
            'user' => $user,
            'posts' => $post->where('user_id', $user->id)->orderBy('created_at', 'DESC')->paginate(20),
            'kind' => 0,
        ]);
    }
    
    function mypageBigPost(User $user, Post $post) {
        return view('users.mypage_post')->with([
            'user' => $user,
            'posts' => $post->where('user_id', $user->id)->where('is_big_post', 1)->orderBy('created_at', 'DESC')->paginate(20),
            'kind' => 1,
        ]);
    }
    
    function mypageStore(User $user, Store $store) {
        return view('users.mypage_store')->with([
            'user' => $user,
            'stores' => $store->where('user_id', $user->id)->orderBy('updated_at', 'DESC')->get(),
        ]);
    }
}
