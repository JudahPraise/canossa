<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(){
    
        $users = User::all();
        // dd($users);
        $messages = Message::where('sender_type','=','Admin')->get();
        return view('admin.messages.index', compact('users', 'messages'));


    }

    

}
