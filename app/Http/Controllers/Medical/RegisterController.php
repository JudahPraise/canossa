<?php

namespace App\Http\Controllers\Medical;

use App\Nurse;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    /**     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function post(Request $request, $id)
    {

        if (Hash::check($request->password, Auth::guard('admin')->user()->password))
        {
            $nurse = Nurse::where('user_id','=',$id)->first();
            $employee = User::where('id','=',$id)->first();

            if ($nurse === null) {

                $nurse = new Nurse();

                $nurse->name = $employee->fullname();
                $nurse->user_id = $employee->id;          
                $nurse->role = $employee->role;  
                $nurse->image = $employee->image;  
                $nurse->employee_id = $employee->employee_id;
                $nurse->password = $employee->password;

                $nurse->save();

                return redirect()->back()->with('success', sprintf('You gave %s access to medical records', $employee->name));
            }

            return redirect()->back()->with('update', sprintf('%s already have access to medical records', $employee->name));
        }

        return redirect()->back()->with('warning', 'Wrong password');
    }
}
