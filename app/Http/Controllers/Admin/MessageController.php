<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index(){

        $users = User::all();
        return view('admin.messages.index', compact('users'));

    }

    

}
