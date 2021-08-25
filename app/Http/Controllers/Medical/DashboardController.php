<?php

namespace App\Http\Controllers\Medical;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Diagnosis;

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
        $diagnosis = Diagnosis::where('employee_id','=',$id)->first();
        return view('medical-record.dashboard.show', compact(['user','diagnosis']));
    }
}
