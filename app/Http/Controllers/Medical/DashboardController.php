<?php

namespace App\Http\Controllers\Medical;

use App\User;
use App\MedicalRecord;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $users = MedicalRecord::with('user','history','latestLabtest')->get();
        // dd($users);
        return view('medical-record.dashboard.index', compact('users'));
    }


}
