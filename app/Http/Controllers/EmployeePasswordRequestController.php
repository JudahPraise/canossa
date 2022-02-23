<?php

namespace App\Http\Controllers;

use App\User;
use App\PasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            $hasRequest = PasswordRequest::where([['employee_id','=',$user->employee_id], ['category','=','employee'], ['status','=','pending']])->first();
            
            if($hasRequest)
            {
                return view('login-pages.employee-pending-message');
            }

            if($user->dob === $request->dob)
            {
                PasswordRequest::create([
                    'name' => $user->fullName(),
                    'employee_id' => $request->employee_id,
                    'admin_id' => "",
                    'dob' => $request->dob,
                    'category' => 'employee',
                    'status' => 'pending',
                    'change_by' => 'N\A'
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

    public function changePassword($id)
    {
        $password_request = PasswordRequest::where('id','=',$id)->first();
        $user = User::where('employee_id','=',$password_request->employee_id)->first();
        return view('login-pages.employee-change-password', compact('user', 'password_request'));
    }

    public function updatePassword(Request $request, $id, $reqid)
    {
        $user = User::where('id','=',$id)->first();
        
        if($user->dob != $request->dob)
        {
            session()->flash('invalid', 'Employee does not exist!');
            return redirect()->back();
        }

        $request->validate([
            'password' => 'required|confirmed|min:6'
        ]);

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        $password_request = PasswordRequest::where('id','=',$reqid)->update([
            'status' => 'changed',
            'change_by' => $user->fullName()." "."|"." ".$user->employee_id
        ]);

        return redirect()->route('employee.logout');

    }
}
