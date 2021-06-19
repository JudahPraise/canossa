<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employees = User::all();
        $teachers = User::where('role','=','Teacher')->count();
        $staffs = User::where('role','=','Staff')->count();
        $maintenance = User::where('role','=','Maintenance')->count();
        return view('admin.home.dashboard', compact(['employees', 'teachers', 'staffs', 'maintenance']));
    }
}
