<?php

namespace App\Http\Controllers\Employee;

use App\User;
use App\Family;
use Illuminate\Http\Request;
use App\EducationalBackground;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        
        $employee = User::where('id','=',Auth::user()->id)->with('personal', 'experiences', 'trainings')->first();
        // dd($employee->experiences);
        $family = Family::where('user_id','=',$employee->id)->with('spouse', 'father', 'mother', 'children')->first();
        $educ = EducationalBackground::where('user_id','=',$employee->id)->with('elem', 'sec', 'col', 'col')->first();
        // dd($educ->elem);
        return view('employee.profile.index', compact(['employee', 'family', 'educ']));

    }
}
