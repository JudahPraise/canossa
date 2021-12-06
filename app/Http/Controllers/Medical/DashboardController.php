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
        return view('medical-record.dashboard.index', compact('users'));
    }

    public function create()
    {
        return view('medical-record.dashboard.create');
    }

    public function show($id)
    {
        $record = MedicalRecord::where('id','=',$id)->with('user','history','latestLabtest')->first();
        return view('medical-record.dashboard.show', compact('record'));
    }


}
