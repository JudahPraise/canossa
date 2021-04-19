<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class StudentLoginController extends Controller
{
    public function __construct(){

        $this->middleware('guest:student', ['except' => ['logout']]);

    }

    public function showLoginForm(){
        return view('login-pages.student');
    }

    public function login(Request $request){

        //* Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        //* Attempt to log the user in
        if(Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            //* If successful, then redirect to their intended location
            return redirect()->intended(route('student'));
        }

        //* If unsuccessful, redirect back to login
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect('/');
    }
}
