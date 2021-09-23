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
        $employees = User::where('category','Regular')->orWhere('category','Part Time')->orderBy('lname', 'ASC')->get();
        $teachers = $employees->where('role','=','Teacher')->count();
        $staffs = $employees->where('role','=','Staff')->count();
        $maintenance = $employees->where('role','=','Maintenance')->count();
        $category = 'All';
        return view('admin.home.dashboard', compact(['employees', 'staffs', 'maintenance', 'teachers']))->with('category', $category);
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
}
