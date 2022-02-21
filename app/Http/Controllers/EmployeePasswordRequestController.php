<?php

namespace App\Http\Controllers;

use App\User;
use App\PasswordRequest;
use Illuminate\Http\Request;

class EmployeePasswordRequestController extends Controller
{
    public function employeeIndex()
    {
        return view('login-pages.employee-forgot-password');
    }

    public function sendRequestEmployee(Request $request)
    {

        $user = User::where('employee_id','=',$request->employee_id)->first();

        if($user)
        {
            if($user->dob === $request->dob)
            {
                PasswordRequest::create([
                    'name' => $user->fullName(),
                    'employee_id' => $request->employee_id,
                    'admin_id' => "",
                    'dob' => $request->dob,
                    'category' => 'employee',
                    'status' => 'pending'
                ]);

                return redirect()->route('forgotpass.request.sent');
            }
            
            session()->flash('dob', 'Invalid Credentials');
            return redirect()->back();
        }

        session()->flash('invalid', 'Employee does not exist!');
        return redirect()->back();

    }

    public function requestSentEmployee()
    {
        return view('login-pages.employee-request-sent');
    }
}
