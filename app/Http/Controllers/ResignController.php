<?php

namespace App\Http\Controllers;

use App\User;
use App\Admin;
use App\AdminDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResignController extends Controller
{
    public function resign($id)
    {

        $employee = User::where('id','=',$id)->first();
        $admin = Admin::where('employee_id','=',$employee->employee_id)->first();
        
        if(!empty($admin))
        {
            $get_description = AdminDescription::where('id','=',$admin->desc_id)->first();
            $admin->delete();
        }

        User::where('id','=',$id)->update([
            'category' => 'Resigned',
        ]);

        if(!empty($admin))
        {
            $admin->delete();
            $format = "%s resigned from a position, %s administrator is vacant!";
            return redirect()->back()->with('delete', sprintf($format, $employee->employee_id, $get_description->description));
        }
        return redirect()->back()->with('delete', sprintf('%s resigned from a position!', $employee->employee_id));
    }

    public function retrieve(Request $request, $id)
    {
        User::where('id','=',$id)->update([
            'category' => $request->category,
        ]);

        return redirect()->back();
    }
}
