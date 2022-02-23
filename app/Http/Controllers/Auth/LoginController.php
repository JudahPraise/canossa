<?php

namespace App\Http\Controllers\Auth;

use App\PasswordRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
            'password' => 'required|min:6'
        ]); 

        $password_requests = PasswordRequest::where([['employee_id','=',$request->employee_id], ['category','=','employee']])->get();
        $isUpdated = $password_requests->contains('status', 'updated');
        $isPending = $password_requests->contains('status', 'pending');
        //* If requested a password and the status is update
        if($isUpdated)
        {
            if(Auth::guard('web')->attempt(['employee_id' => $request->employee_id, 'password' => $request->password]))
            {
                $password_request = PasswordRequest::where([['employee_id','=',$request->employee_id], ['category','=','employee'], ['status','=','updated']])->first();
                return redirect()->intended(route('changepass.index', $password_request->id));
            }

            session()->flash('login', 'Invalid Credentials');
            return redirect()->back();
        }
        else if($isPending)
        {
            
            if(Auth::guard('web')->attempt(['employee_id' => $request->employee_id, 'password' => $request->password]))
            {
                $password_request = PasswordRequest::where([['employee_id','=',$request->employee_id], ['category','=','employee'], ['status','=','pending']])->first();
                $password_request->update([
                    'status' => 'retrieved'
                ]);

                return redirect()->intended(route('home'));
            }

            return view('login-pages.employee-pending-message');
        }
        else
        {
            //* Attempt to log the user in
            if(Auth::guard('web')->attempt(['employee_id' => $request->employee_id, 'password' => $request->password]))
            {
                //* If requested a password and the status is changed
                //* If successful, then redirect to their intended location
                return redirect()->intended(route('home'));
            }


            //* If unsuccessful, redirect back to login
            session()->flash('login', 'Invalid Credentials');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        Session::flush();
        return redirect('/');
    }
    
}
