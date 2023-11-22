<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notification;
use App\Models\Checktime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    function show(Notification $notification) {
        $checktime = Checktime::where('user_id', Auth::id())->first();
        $check_at = "";
        if($checktime) {
            $check_at = $checktime->check_at;
            $checktime->check_at = now();
            $checktime->save();
        } else {
            Checktime::create([
                'user_id' => Auth::id(),
                'check_at' => now(),
            ]);
        }
        return view('users.notifications')->with([
            'notifications' => $notification->where('user_id', Auth::id())->orderBy('updated_at', 'DESC')->paginate(20),
            'check_at' => $check_at,
        ]);
    }
}
