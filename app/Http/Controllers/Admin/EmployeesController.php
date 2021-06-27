<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Family;
use Illuminate\Http\Request;
use App\EducationalBackground;
use App\Http\Controllers\Controller;

class EmployeesController extends Controller
{
    public function index(){

        $employees = User::where('status','=','active')->with('personal')->get();
        return view('admin.employees.index', compact('employees'));

    }

    public function show($id){
        $employees = User::with('personal')->get();
        $employee = User::where('id','=',$id)->with('personal', 'experiences', 'trainings', 'voluntary_works', 'documents')->first();
        $family = Family::where('user_id','=',$employee->id)->with('spouse', 'father', 'mother', 'children')->first();
        $educ = EducationalBackground::where('user_id','=',$employee->id)->with('elem', 'sec', 'col', 'col')->first();
        return view('admin.employees.show', compact(['employee', 'family','educ', 'employees']));

    }
}
