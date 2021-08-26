<?php

namespace App\Http\Controllers\Medical;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Diagnosis;
use App\PhysicalExam;
use App\Hospitalization;

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
        $diagnosis = Diagnosis::where('employee_id','=',$id)->latest()->first();
        $physical = PhysicalExam::where('employee_id','=',$id)->latest()->first();
        $hospital = Hospitalization::where('employee_id','=',$id)->latest()->first();
        return view('medical-record.dashboard.show', compact(['user','diagnosis','physical','hospital']));
    }
}
