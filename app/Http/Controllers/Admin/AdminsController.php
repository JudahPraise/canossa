<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        
        return view('admin.account.create', compact('employee'));
    }

    public function assignAdmin(Request $request)
    {
        if (Hash::check($request->password, Auth::guard('admin')->user()->password))
        {
            $employee = User::where('id', 'like', '%' . $request->employee_id . '%')->first();
            $fullname = $employee->lname.','.$employee->fname.','.$employee->mname.','.$employee->extname;
            Admin::create([
                'name' => $fullname,
                'admin_id' => $request->admin_id,
                'employee_id' => $employee->employee_id,
                'password' => Hash::make($request->admin_pass),
                'user_id' => $request->employee_id,
                'dep_pos' => $request->admin_pos,
            ]);

            return redirect()->back()->with('success', sprintf('You assigned %s as administrator', $employee->employee_id));
        }

       return redirect()->back()->with('delete', 'Wrong Password!');
        
    }
}
