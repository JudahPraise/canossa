<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Schedule;

class ScheduleController extends Controller
{
    public function index(){

        $schedules = Schedule::all();
        return view('employee.dashboard.index', compact('schedules', $schedules));

    }
}
