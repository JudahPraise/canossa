<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Admin;
use App\AdminDescription;
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
        $data = User::select('lname','fname','mname','extname','id','role', 'category')->where("lname","LIKE","%{$request->employee_name}%")->where('category','!=','Resigned')->get();
        return response()->json($data);
    }  

    public function getEmployee($id)
    {
        $employee = User::where('id','=',$id)->first();
        $descriptions = AdminDescription::all();
        
        if (Admin::where('employee_id',$employee->employee_id)->exists()) {
            return redirect()->back()->with('update', sprintf('%s is already administrator', $employee->employee_id));
        }
        return view('admin.account.create', compact(['employee', 'descriptions']));
        
    }

    public function assignAdmin(Request $request)
    {
        if (Hash::check($request->password, Auth::guard('admin')->user()->password))
        {
            $get_description = AdminDescription::where('description',$request->admin_pos)->first();
            $employee = User::where('id','=',$request->employee_id)->first();
            $fullname = $employee->lname.','.$employee->fname.','.$employee->mname.','.$employee->extname;
            $admins = Admin::where('desc_id','=',$get_description->admin_id)->first();
            if(!empty($admins)){

                AdminDescription::where('description','=',$request->admin_pos)->update([
                    'admin_id' => $request->admin_id,
                ]);

                $admin = Admin::where('desc_id','=',$get_description->id)->first();

                $admin->name = $fullname;
                $admin->employee_id = $employee->employee_id;
                $admin->admin_id = $request->admin_id;
                $admin->user_id = $request->employee_id;
                $admin->password = Hash::make($request->admin_pass);

                $admin->update();
                
                return redirect()->route('admin.accounts')->with('update', sprintf('%s user is successfully updated', $request->admin_pos));
            }

            AdminDescription::where('description','=',$request->admin_pos)->update([
                'admin_id' => $request->admin_id,
            ]);

            Admin::create([
                'name' => $fullname,
                'admin_id' => $request->admin_id,
                'employee_id' => $employee->employee_id,
                'password' => Hash::make($request->admin_pass),
                'user_id' => $request->employee_id,
                'desc_id' => $get_description->id,
                'dep_pos' => $request->admin_pos,
            ]);

            return redirect()->route('admin.accounts')->with('success', sprintf('You assigned %s as administrator', $employee->employee_id));
        }

       return redirect()->back()->with('delete', 'Wrong Password!');
    }

}
