<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function notificationIndex(){

        $notifications = auth()->user()->unreadNotifications;

        return view('notifications.index', compact('notifications'));
    }

    public function notificationMark(){

        auth()->user()->unreadNotifications->markAsRead();
        return redirect('/notifications');
    }  
}
