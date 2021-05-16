<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function markAsRead($id){

        // dd('marked');

        $notification = auth()->user()->notifications()->find($id);
        $notification->markAsRead();

        return redirect()->back();

    }

    public function markAllAsRead(){

        $notification = auth()->user()->notifications()->get();
        $notification->markAsRead();

        return redirect()->back();

    }
}
