<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function notifications(){
        //marks all as read
//       // dd(auth()->user()->notifications->first()->data['discussion']['title']);
        auth()->user()->unreadNotifications->markAsRead();
        //Display All notifications
        return view('frontend.user.notification',['notifications'=>auth()->user()->notifications()->paginate(5)]);
    }

}
