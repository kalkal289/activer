<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function filter(Request $request) {
        $keyword = $request['keyword'];
        $is_followed_user = $request['is_followed_user'];
        
        $query = User::query();
        
        if($is_followed_user) {
            $auth_id = Auth::id();
            $followeds = User::find($auth_id)->followeds()->get();
            $followeds_id = [];
            foreach($followeds as $followed) {
                array_push($followeds_id, $followed->id);
            }
            $query->whereIn('id', $followeds_id);
        }
        
        if($keyword) {
            $spaceConversion = mb_convert_kana($keyword, 's');
            $keywordArray = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            foreach($keywordArray as $word) {
                if(substr($word, 0, 1) == '#') {
                    $tag_word = substr($word, 1);
                    $query->whereHas('usertags', function ($query) use ($tag_word) {
                        $query->where('name', 'like', '%' .$tag_word. '%');
                    });
                } else {
                    $query->where(function($query) use ($word) {
                        $query->where('name', 'like', '%'. $word. '%')->orWhere('message', 'like', '%'. $word. '%');
                    });
                }
            }
        }
        
        $users = $query->withCount('followers')->orderBy('followers_count', 'DESC')->paginate(20);
        
        return view('users.user_list')->with([
            'users' => $users,
            'is_followed_user' => $is_followed_user,
            'is_big_post' => '',
            'keyword' => $keyword
        ]);
        
    }
}
