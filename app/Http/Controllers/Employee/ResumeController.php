<?php

namespace App\Http\Controllers\Employee;

use App\User;
use App\Family;
use Illuminate\Http\Request;
use App\EducationalBackground;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    public function index(){

        $employee = User::where('id','=',Auth::guard('web')->user()->id)->with('personal', 'experiences', 'trainings', 'voluntary_works', 'documents')->first();
        $family = Family::where('user_id','=',$employee->id)->with('spouse', 'father', 'mother', 'children')->first();
        $educ = EducationalBackground::where('user_id','=',$employee->id)->with('elem', 'sec', 'col', 'grad')->first();
        return view('employee.resume.index', compact(['employee', 'family', 'educ']));

    }
}
