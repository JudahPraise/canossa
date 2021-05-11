<?php

namespace App\Http\Controllers\Employee;

use App\Day;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index(){

        $days = Day::all();
        $currentDate = Carbon::now()->format( 'l' );
        $schedules = Schedule::with('day')->where('user_id','=',Auth::user()->id)->where('day','=',$currentDate)->get();
        return view('employee.dashboard.index', compact([['days', $days], ['schedules', $schedules]]));

    }

    public function store(Request $request){

        $schedule = new Schedule();

        $schedule->day = $request->input('day');
        $schedule->user_id = Auth::user()->id;
        $schedule->title = $request->input('title');
        $schedule->time_from = $request->input('time_from');
        $schedule->time_to = $request->input('time_to');


        $schedule->save();
        
        return redirect()->route('schedule.index');

    }

    public function update(Request $request){

        $schedule = Schedule::where('id','=',$request->input('id'))->first();

        $schedule->day_id = $request->input('day_id');
        $schedule->user_id = Auth::user()->id;
        $schedule->title = $request->input('title');
        $schedule->time_from = $request->input('time_from');
        $schedule->time_to = $request->input('time_to');


        $schedule->update();
        
        return redirect()->route('schedule.index');

    }

    public function delete($id){

        $schedule = Schedule::where('id','=',$id)->first();
        $schedule->delete();

        return redirect()->route('schedule.index');

    }

    public function filter($day){
        
        $days = Day::all();
        $schedules = Schedule::where('user_id','=',Auth::user()->id)->where('day','=',$day)->with('day')->get();
        return view('employee.dashboard.index', compact([['days', $days], ['schedules', $schedules]]));

    }
    
    public function filterAll(){
        
        $days = Day::all();
        $schedules = Schedule::where('user_id','=',Auth::user()->id)->with('day')->get();
        return view('employee.dashboard.index', compact([['days', $days], ['schedules', $schedules]]));

    }

}