<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;

class AdminsController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admin.account.admins', compact('admins'));
    }
}
