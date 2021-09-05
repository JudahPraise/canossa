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

    public function index(){
        $employees = User::orderBy('name', 'ASC')->paginate(10);
        return view('admin.manage-accounts.index', compact('employees', $employees));

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

        $employee->name = $request->input('name');       
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
            'family_name' => $employee->name,
        ]);

        $employee->education()->create([
            'user_id' => $employee->id,
            'name' => $employee->name,
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
