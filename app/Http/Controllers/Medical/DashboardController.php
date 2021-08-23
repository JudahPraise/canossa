<?php

namespace App\Http\Controllers\Medical;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::where('status','=','active')->with('personal')->get();
        return view('medical-record.dashboard.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::where('id','=',$id)->with('personal')->first();
        return view('medical-record.dashboard.show', compact('user'));
    }
}
