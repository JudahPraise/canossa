<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/employee';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(){

        return view('login-pages.employee');
        
    }

    public function login(Request $request){

        //* Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]); 
        
        //* Attempt to log the user in
        if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            //* If successful, then redirect to their intended location
            session()->flash('loggedIn', 'Successfully Logged In');
            return redirect()->intended(route('home'));
        }

        //* If unsuccessful, redirect back to login
        session()->flash('error', 'Invalid Credentials');
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        Session::flush();
        return redirect('/');
    }
    
}
