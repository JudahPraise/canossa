<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

        $employee->fname = $request->fname;       
        $employee->lname = $request->lname;       
        $employee->mname = $request->mname;       
        $employee->extname = $request->extname;       
        $employee->employee_id = $request->employee_id;    
        $employee->sex = $request->sex;    
        $employee->dob = $request->dob;    
        $employee->role = $request->role;    
        $employee->category = $request->category;    
        $employee->department = $request->department;
        $employee->qr_token = $request->qr_token;
        $employee->password = Hash::make($request->password);
        if($request->sex == 'M')
        {
            $employee->image = 'default-male.svg';
        }
        else
        {
            $employee->image = 'default-female.svg';

        }
        $employee->password = Hash::make($request->password);

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

        $now = Carbon::now()->format('Y');
        $nextYear = Carbon::now()->addYear()->format('Y');

        $employee->records()->create([
            'user_id' => $employee->id,
            'year_from' => $now,
            'year_to' => $nextYear
        ]);

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
