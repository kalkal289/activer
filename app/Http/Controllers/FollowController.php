<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    // only()の引数内のメソッドはログイン時のみ有効
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['follow', 'unfollow']);
    }
    
    //引数のIDに基づくユーザーをフォローする
    function follow($user_id) {
        Follow::create([
            'follower_id' => Auth::id(),
            'followed_id' => $user_id,
        ]);
        
        return redirect()->back();
    }
    
    //引数のIDに基づくユーザーのフォローを解除する
    function unfollow($user_id) {
        $like = Follow::where('follower_id', Auth::id())->where('followed_id', $user_id)->first();
        $like->delete();
        return redirect()->back();
    }
}
