<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\User;
use App\Models\Storecategory;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary; //画像アップロード

class StoreController extends Controller
{
    public function create(Storecategory $storecategory) {
        return view('stores.create')->with(['categories' => $storecategory->get()]);
    }
    
    public function edit(Store $store, Storecategory $storecategory) {
        return view('stores.create')->with([
            'store' => $store,
            'categories' => $storecategory->get(),
        ]);
    }
    
    public function store(Store $store, StoreRequest $request) {
        $input = $request['store'];
        if($request->file('image')) {
            $images = $request->file('image');
            for($i = 0; $i < count($images) && $i < 4; $i++) {
                $image_url = Cloudinary::upload($images[$i]->getRealPath())->getSecurePath();
                $input += ['image'.($i + 1) => $image_url];
            }
        }
        $store->fill($input)->save();
        return redirect('/mypages/store/'. Auth::id()); 
    }
    
    public function update(Store $store, StoreRequest $request) {
        $input = $request['store'];
        if($request->file('image')) {
            $images = $request->file('image');
            for($i = 0; $i < count($images); $i++) {
                $image_url = Cloudinary::upload($images[$i]->getRealPath())->getSecurePath();
                $input += ['image'.($i + 1) => $image_url];
            }
        }
        $store->fill($input)->save();
        return redirect('/mypages/store/'. Auth::id()); 
    }
    
    public function show(Store $store) {
        return view('stores.show')->with(['store' => $store]);
    }
    
    public function delete(Store $store) {
        $main->delete();
        return redirect('/mypages/store/'. Auth::id());
    }
    
    //ストアを検索する関数
    public function filter(Request $request) {
        $keyword = $request['keyword'];
        $is_followed_user = $request['is_followed_user'];
        
        //ここから絞り込み処理
        $query = Store::query();
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
                $query->where('title', 'like', '%'.$word.'%')->orWhere('content', 'like', '%'.$word.'%');
            }
        }
        $stores = $query->orderBy('created_at', 'DESC')->paginate(20);
        return view('stores.filtered')->with([
            'is_followed_user' => $is_followed_user,
            'is_big_post' => '',
            'keyword' => $keyword,    
            'stores' => $stores,
        ]);
    }
}
