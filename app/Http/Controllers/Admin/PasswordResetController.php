<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Admin;
use App\PasswordRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    public function index()
    {
        $requests = PasswordRequest::all();
        return view('admin.password-reset.index', compact('requests'));
    }

    public function passwordConfirm(Request $request, $id)
    {
        if (Hash::check($request->password, Auth::guard('admin')->user()->password))
        {
            $request = PasswordRequest::where('id','=',$id)->first();
            
            if($request->category == 'admin')
            {
                $employee = Admin::where('admin_id','=',$request->admin_id)->first();
                return view('admin.password-reset.update', compact('employee', 'request'));
            }

            $employee = User::where('employee_id','=',$request->employee_id)->first();
            return view('admin.password-reset.update', compact('employee', 'request'));
        }

        return redirect()->back()->with('warning', 'Wrong password');
    }

    public function update(Request $request, $id, $category)
    {
        if (Hash::check($request->password, Auth::guard('admin')->user()->password))
        {
            $password_request = PasswordRequest::where('id','=',$id)->first();

            if($category === 'admin')
            {
                $admin_account = Admin::where('admin_id','=',$password_request->admin_id)->update([
                    'password' => Hash::make($request->newPassword)
                ]);
                
                $change_by = Auth::guard('admin')->user()->name." "."|"." ".Auth::guard('admin')->user()->admin_id;

                $password_request->status = "updated";
                $password_request->change_by = $change_by;
                
                $password_request->update();

                if($password_request->admin_id === Auth::guard('admin')->user()->admin_id)
                {
                    return redirect()->route('admin.logout');
                }
                
                // dd('false');
                return redirect()->route('passwordreset.index')->with('success', 'Password updated successfully!');
            }

            $employee_account = User::where('employee_id','=',$password_request->employee_id)->update([
                'password' => Hash::make($request->newPassword)
            ]);
            
            $change_by = Auth::guard('admin')->user()->name." "."|"." ".Auth::guard('admin')->user()->admin_id;

            $password_request->status = "updated";
            $password_request->change_by = $change_by;
            
            $password_request->update();

            return redirect()->route('passwordreset.index')->with('success', 'Password updated successfully!');
        }
        
        return redirect()->route('passwordreset.index')->with('warning', 'Wrong password');
    }

}
