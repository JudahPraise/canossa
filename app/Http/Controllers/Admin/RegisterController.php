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
        return view('admin.manage-accounts.index');
    }

    function fetchEmployees()
    {
        $employees = User::orderBy('lname', 'ASC')->get();
        return response()->json([
            "employees" => $employees,
        ]);
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
        $employee->department = $request->input('department');
        $employee->email = $request->input('email');
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

        return redirect()->route('accounts.index');
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
