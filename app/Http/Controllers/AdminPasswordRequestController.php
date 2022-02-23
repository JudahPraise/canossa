<?php

namespace App\Http\Controllers;

use App\User;
use App\Admin;
use App\PasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            $hasRequest = PasswordRequest::where([['admin_id','=',$admin->admin_id], ['category','=','admin'], ['status','=','pending']])->first();
            
            if($hasRequest)
            {
                return view('login-pages.admin-pending-message');
            }

            if($user->dob === $request->dob)
            {
                PasswordRequest::create([
                    'name' => $user->fullName(),
                    'admin_id' => $request->admin_id,
                    'employee_id' => $user->employee_id,
                    'dob' => $request->dob,
                    'category' => 'admin', 
                    'status' => 'pending',
                    'change_by' => 'N\A'
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
    
    public function changePassword($id)
    {
        $password_request = PasswordRequest::where('id','=',$id)->first();
        $admin = Admin::where('admin_id','=',$password_request->admin_id)->first();
        return view('login-pages.admin-change-password', compact('admin', 'password_request'));
    }

    public function updatePassword(Request $request, $id, $reqid)
    {
        $admin = Admin::where('id','=',$id)->first();
        $user = User::where('employee_id','=',$admin->employee_id)->first();
        
        if($user->dob != $request->dob)
        {
            session()->flash('invalid', 'Employee does not exist!');
            return redirect()->back();
        }

        $request->validate([
            'password' => 'required|confirmed|min:6'
        ]);

        $admin->update([
            'password' => Hash::make($request->password)
        ]);

        $password_request = PasswordRequest::where('id','=',$reqid)->update([
            'status' => 'changed',
            'change_by' => $admin->name." "."|"." ".$admin->admin_id
        ]);

        return redirect()->route('admin.logout');
    }

}
