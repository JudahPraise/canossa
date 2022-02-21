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
    }

}
