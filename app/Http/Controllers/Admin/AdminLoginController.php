<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{
    public function __construct(){

        $this->middleware('guest:admin', ['except' => ['logout']]);

    }

    public function showLoginForm(){
        return view('login-pages.admin');
    }

    public function login(Request $request){

        //* Validate the form data
        $this->validate($request, [
            'password' => 'required|min:6'
        ]);
        
        //* Attempt to log the user in
        if(Auth::guard('admin')->attempt(['admin_id' => $request->admin_id, 'password' => $request->password], $request->remember)) {
            //* If successful, then redirect to their intended location
            return redirect()->intended(route('admin'));
        }

        //* If unsuccessful, redirect back to login
        return redirect()->back();
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Session::flush();
        return redirect('/');
    }
}
