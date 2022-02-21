<?php

namespace App\Http\Controllers;

use App\User;
use App\Admin;
use App\PasswordRequest;
use Illuminate\Http\Request;

class AdminPasswordRequestController extends Controller
{
    public function index()
    {
        return view('login-pages.admin-forgot-password');
    }

    public function sendRequestAdmin(Request $request)
    {

        $admin = Admin::where('admin_id','=',$request->admin_id)->first();
        
        if($admin)
        {
            $user = User::where('employee_id','=',$admin->employee_id)->first();

            if($user->dob === $request->dob)
            {
                PasswordRequest::create([
                    'name' => $user->fullName(),
                    'admin_id' => $request->admin_id,
                    'employee_id' => $user->employee_id,
                    'dob' => $request->dob,
                    'category' => 'admin', 
                    'status' => 'pending'
                ]);

                return redirect()->route('forgotpass.request.sent.admin');
            }
            
            session()->flash('dob', 'Invalid Credentials');
            return redirect()->back();
        }

        session()->flash('invalid', 'Admin does not exist!');
        return redirect()->back();

    }

    
    public function requestSentAdmin()
    {
        return view('login-pages.admin-forgot-password-sent');
    }


}
