<?php

namespace App\Http\Controllers\Medical;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class NurseLoginController extends Controller
{
    public function __construct(){

        $this->middleware('guest:nurse', ['except' => ['logout']]);

    }

    public function showLoginForm(){
        return view('login-pages.nurse');
    }

    public function login(Request $request){

         //* Validate the form data
         $this->validate($request, [
            'password' => 'required|min:6'
        ]);

        //* Attempt to log the user in
        if(Auth::guard('nurse')->attempt(['employee_id' => $request->employee_id, 'password' => $request->password], $request->remember)) {
            //* If successful, then redirect to their intended location
            return redirect()->intended(route('nurse'));
        }

        //* If unsuccessful, redirect back to login
        session()->flash('login', 'Invalid Credentials');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::guard('nurse')->logout();

        return redirect('/');
    }
}
