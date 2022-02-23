<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NursePasswordRequestController extends Controller
{
    public function index()
    {
        return view('login-pages.nurse-forgot-password');
    }
}
