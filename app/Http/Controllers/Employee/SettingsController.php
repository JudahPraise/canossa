<?php

namespace App\Http\Controllers\Employee;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index(){

        $employee = User::where('id','=',Auth::user()->id)->with('personal', 'experiences', 'trainings', 'voluntary_works', 'documents')->first();
        return view('employee.settings.index', compact(['employee']));

    }

    public function update(Request $request, $id){

        User::where('id','=',$id)->update([

            'fname' =>  $request->input('fname'),
            'mname' =>  $request->input('mname'),
            'lname' =>  $request->input('lname'),
            'extname' =>  $request->input('extname'),
            'employee_id' =>  $request->input('employee_id'),
            'department' => $request->input('department'),
            'role' => $request->input('role'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->back()->with('update', 'Account information updated!');
    }
}
