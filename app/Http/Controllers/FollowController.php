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
    
    function follow(User $user) {
        $auth_id = Auth::id();
        $already_followed = Follow::where('follower_id', $auth_id)->where('followed_id', $user->id)->first();
        if(!$already_followed) {
            Follow::create([
                'follower_id' => $auth_id,
                'followed_id' => $user->id,
            ]);
        } else {
            Follow::where('follower_id', $auth_id)->where('followed_id', $user->id)->delete();
        }
        $user_followers_count = $user->followers()->count();
        $user_followeds_count = $user->followeds()->count();
        $param = [
            'user_followers_count' => $user_followers_count,
            'user_followeds_count' => $user_followeds_count,
        ];
        return response()->json($param);
        
    }
    
    function followList(User $user, Request $request) {
        $auth_id = Auth::id();
        $main_id = $request->main_id;
        $main_user = User::find($main_id);
        $already_followed = Follow::where('follower_id', $auth_id)->where('followed_id', $user->id)->first();
        if(!$already_followed) {
            Follow::create([
                'follower_id' => $auth_id,
                'followed_id' => $user->id,
            ]);
        } else {
            Follow::where('follower_id', $auth_id)->where('followed_id', $user->id)->delete();
        }
        $user_followers_count = $main_user->followers()->count();
        $user_followeds_count = $main_user->followeds()->count();
        $param = [
            'user_followers_count' => $user_followers_count,
            'user_followeds_count' => $user_followeds_count,
        ];
        return response()->json($param);
        
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
