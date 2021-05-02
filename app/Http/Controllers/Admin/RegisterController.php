<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){
        
        $employees = User::all();
        return view('admin.manage-accounts.index', compact('employees', $employees));

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function post(Request $request)
    {
        $employee = new User();

        $employee->fname = $request->input('fname');    
        $employee->mname = $request->input('mname');    
        $employee->lname = $request->input('lname');    
        $employee->employee_id = $request->input('employee_id');    
        $employee->sex = $request->input('sex');    
        $employee->role = $request->input('role');    
        $employee->department = $request->input('department');
        $employee->email = $request->input('email');
        $employee->password = Hash::make($request->input('password'));

        $employee->save();

        return redirect()->route('register.index');
    }
}
