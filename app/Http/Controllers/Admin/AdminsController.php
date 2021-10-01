<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Admin;

class AdminsController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admin.account.admins', compact('admins'));
    }

    public function create()
    {
        return view('admin.account.create');
    }

    // AJAX request
    public function getEmployees(Request $request)
    {    
        $data = User::select('lname','fname','mname','extname','id','role', 'category')->where("lname","LIKE","%{$request->employee_name}%")->get();

        return response()->json($data);
    }  

    public function getEmployee($id)
    {
        $employee = User::where('id','=',$id)->first();
        dd($employee);
    }
}
