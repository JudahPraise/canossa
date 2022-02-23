<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\PasswordRequest;
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

        $password_requests = PasswordRequest::where([['admin_id','=',$request->admin_id], ['category','=','admin']])->get();
        $isUpdated = $password_requests->contains('status', 'updated');
        $isPending = $password_requests->contains('status', 'pending');

        //* If requested a password and the status is update
        if($isUpdated)
        {

            //* Attempt to log the user in
            if(Auth::guard('admin')->attempt(['admin_id' => $request->admin_id, 'password' => $request->password], $request->remember)) {
                $password_request = PasswordRequest::where([['admin_id','=',$request->admin_id], ['category','=','admin'], ['status','=','updated']])->first();
                return redirect()->route('changepass.index.admin', $password_request->id);
            }

            //* If unsuccessful, redirect back to login
            session()->flash('login', 'Invalid Credentials');
            return redirect()->back();

        }
        else if($isPending)
        {
            if(Auth::guard('admin')->attempt(['admin_id' => $request->admin_id, 'password' => $request->password]))
            {
                $password_request = PasswordRequest::where([['admin_id','=',$request->admin_id], ['category','=','admin'], ['status','=','pending']])->first();

                $password_request->update([
                    "status" => "retrieved"
                ]);

                return redirect()->intended(route('admin'));
            }

            return view('login-pages.admin-pending-message');

        }
        else //*isChanged
        {
            //* Attempt to log the user in
            if(Auth::guard('admin')->attempt(['admin_id' => $request->admin_id, 'password' => $request->password]))
            {


                //* If requested a password and the status is changed
                //* If successful, then redirect to their intended location
                return redirect()->intended(route('admin'));
            }


            //* If unsuccessful, redirect back to login
            session()->flash('login', 'Invalid Credentials');
            return redirect()->back();
        }
        
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Session::flush();
        return redirect('/');
    }
}
