<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntranceController extends Controller
{
    public function entrance($kind) {
        // $kindはいいねなら0、コメントなら1
        return view('auth.entrance')->with(['kind' => $kind]);
    }
}
