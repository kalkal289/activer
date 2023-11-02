<?php

namespace App\Http\Controllers;

use App\Models\Main;
use App\Models\User;
use App\Models\Category;
use App\Http\Requests\MainRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary; //画像アップロード

class MainController extends Controller
{
    public function create(Category $category) {
        return view('mains.create')->with(['categories' => $category->get()]);
    }
    
    public function edit(Main $main, Category $category) {
        return view('mains.edit')->with([
            'main' => $main,
            'categories' => $category->get(),
        ]);
    }
    
    public function store(Main $main, MainRequest $request) {
        $input = $request['main'];
        
        //添付画像をアップロードしURLを取得
        if($request->file('image')) {
            $images = $request->file('image');
            for($i = 0; $i < count($images) && $i < 4; $i++) {
                $image_url = Cloudinary::upload($images[$i]->getRealPath())->getSecurePath();
                $input += ['image'.($i + 1) => $image_url];
            }
        }
        $main->fill($input)->save();
        return redirect('/mypages/'. Auth::id()); 
    }
    
    public function update(Main $main, MainRequest $request) {
        $input = $request['main'];
        if($request->file('image')) {
            $images = $request->file('image');
            for($i = 0; $i < count($images); $i++) {
                $image_url = Cloudinary::upload($images[$i]->getRealPath())->getSecurePath();
                $input += ['image'.($i + 1) => $image_url];
            }
        }
        $main->fill($input)->save();
        return redirect('/mypages/'. Auth::id()); 
    }
    
    public function show(Main $main) {
        return view('mains.show')->with(['main' => $main]);
    }
    
    public function delete(Main $main) {
        $main->delete();
        return redirect('/mypages/'. Auth::id());
    }
    
    //メインコンテンツを検索する関数
    public function filter(Request $request) {
        $keyword = $request['keyword'];
        $is_followed_user = $request['is_followed_user'];
        
        //ここから絞り込み処理
        $query = Main::query();
        if($is_followed_user) {
            $auth_id = Auth::id();
            $followeds = User::find($auth_id)->followeds()->get();
            $followeds_id = [];
            foreach($followeds as $followed) {
                array_push($followeds_id, $followed->id);
            }
            $query->whereIn('user_id', $followeds_id);
        }
        if($keyword) {
            $spaceConversion = mb_convert_kana($keyword, 's');
            $keywordArray = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            foreach($keywordArray as $word) {
                $query->where(function($query) use($word) {
                    $query->where('title', 'like', '%'. $word. '%')->orWhere('content', 'like', '%'. $word. '%');
                });
            }
        }
        $mains = $query->orderBy('created_at', 'DESC')->paginate(20);
        return view('mains.filtered')->with([
            'is_followed_user' => $is_followed_user,
            'is_big_post' => '',
            'keyword' => $keyword,    
            'mains' => $mains,
        ]);
    }
}
