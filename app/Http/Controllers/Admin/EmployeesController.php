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

        $employees = User::with('personal')->get();
        // dd($employees);
        return redirect()->route('employee.show', '1')->with('employees');

    }

    public function show($id){
        $employees = User::all();
        // dd($employees);
        $employee = User::where('id','=',$id)->with('personal', 'experiences', 'trainings', 'voluntary_works', 'documents')->first();
        $family = Family::where('user_id','=',$employee->id)->with('spouse', 'father', 'mother', 'children')->first();
        $educ = EducationalBackground::where('user_id','=',$employee->id)->with('elem', 'sec', 'col', 'col')->first();
        // dd($educ->elem);
        // dd($employee->personal->first_name);
        return view('admin.employees.show', compact(['employee', 'employees', 'family','educ']));

    }
}
