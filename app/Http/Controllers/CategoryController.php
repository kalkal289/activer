<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function edit(Category $category) {
        return view('posts.category_edit')->with(['categories' => $category->where('user_id', Auth::id())->get()]);
    }
    
    public function store(Category $category, CategoryRequest $request) {
        $input = $request['category'];
        $category->fill($input)->save();
        return redirect('/categories'); 
    }
    
    public function update(Category $category, CategoryRequest $request) {
        $input = $request['category'];
        $category->fill($input)->save();
        return redirect('/categories'); 
    }
    
    public function delete(Category $category) {
        $category->delete();
        return redirect('/categories'); 
    }
}
