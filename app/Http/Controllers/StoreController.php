<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Storecategory;
use App\Http\Requests\StoreRequest;
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
            for($i = 0; $i < count($images); $i++) {
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
}
