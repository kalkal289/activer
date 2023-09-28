<?php

namespace App\Http\Controllers;

use App\Models\Main;
use App\Models\Category;
use App\Http\Requests\MainRequest;
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
}
