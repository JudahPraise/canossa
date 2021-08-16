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

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function post(Request $request, $id)
    {

        $employee = User::where('id','=',$id)->first();

        if($employee->role === 'Nurse')
        {
            $nurse = new Nurse();

            $nurse->name = $employee->name;          
            $nurse->role = $employee->role;  
            $nurse->email = $employee->email;
            $nurse->password = $employee->password;

            $nurse->save();
        }
        else
        {
            return 'not a nurse';
        }

        return 'saved';
    }

    // protected function destroy($id){

    //     $user = User::where('id','=',$id)->first();
    //     $user->family->delete();
    //     $user->education->delete();
    //     $user->feedback->delete();
    //     $user->delete();

    //     return redirect()->back();

    // }

}
