<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;

class AccountController extends Controller
{
    public function index($id)
    {
        $admin = Admin::where('id','=',$id)->first();
        return view('admin.account.index', compact('admin'));
    }
}
