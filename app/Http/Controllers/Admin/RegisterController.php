<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    public function index()
    {
        $employees = User::where('category','Regular')->orWhere('category','Part Time')->orderBy('lname', 'ASC')->get();
        // dd($employees);
        $count = User::all()->count();
        $category = 'All';
        return view('admin.manage-accounts.index', compact('employees', 'count'))->with('category', $category);
    }

    public function getCategory(Request $request)
    {
        if($request->category === 'All'){

            return redirect()->route('accounts.index');

        }
        $employees = User::where('category','=',$request->category)->orderBy('lname', 'ASC')->get();
        $count = User::all()->count();
        $category = $request->category;
        return view('admin.manage-accounts.index', compact('employees', 'count'))->with('category', $category);
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function post(Request $request)
    {
        $employee = new User();

        $employee->fname = $request->input('fname');       
        $employee->lname = $request->input('lname');       
        $employee->mname = $request->input('mname');       
        $employee->extname = $request->input('extname');       
        $employee->employee_id = $request->input('employee_id');    
        $employee->sex = $request->input('sex');    
        $employee->dob = $request->input('dob');    
        $employee->role = $request->input('role');    
        $employee->category = $request->input('category');    
        $employee->department = $request->input('department');
        $employee->qr_token = $request->input('qr_token');
        $employee->password = Hash::make($request->input('password'));

        $employee->save();

        $employee->setFamily()->create([
            'user_id' => $employee->id,
            'family_name' => $employee->fullName(),
        ]);

        $employee->education()->create([
            'user_id' => $employee->id,
            'name' => $employee->fullName(),
            'elementary' => null,
            'secondary' => null,
            'college' => null,
            'graduate_study' => null
        ]);

        $data = "Hello World";

        // dd($data);

        return redirect()->route('accounts.index')->with('success', 'Employee registered successfully!');
    }

    protected function destroy($id){

        $user = User::where('id','=',$id)->first();
        $user->family->delete();
        $user->education->delete();
        $user->feedback->delete();
        $user->delete();

        return redirect()->back();

    }

}
