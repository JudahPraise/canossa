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
        $employees = User::where('status','=','active')->orderBy('name', 'ASC')->paginate(5);
        $teachers = $employees->where('role','=','Teacher')->count();
        $staffs = $employees->where('role','=','Staff')->count();
        $maintenance = $employees->where('role','=','Maintenance')->count();
        return view('admin.home.dashboard', compact(['employees', 'staffs', 'maintenance', 'teachers']));
    }
}
