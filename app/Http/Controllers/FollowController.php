<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
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
        $follow = Follow::where('follower_id', Auth::id())->where('followed_id', $user_id)->first();
        $follow->delete();
        return redirect()->back();
    }
    
    //引数のユーザーがフォローしているユーザーを返す
    function followeds(User $user) {
        return view('users.follows')->with([
            'main_user' => $user,
            'users' => $user->followeds()->withPivot('created_at AS followed_at')->orderBy('followed_at', 'desc')->paginate(30),
            'kind' => 0,
        ]);
    }
    
    //引数のユーザーのフォロワーを返す
    function followers(User $user) {
        return view('users.follows')->with([
            'main_user' => $user,
            'users' => $user->followers()->withPivot('created_at AS followed_at')->orderBy('followed_at', 'desc')->paginate(30),
            'kind' => 1,
        ]);
    }
}
