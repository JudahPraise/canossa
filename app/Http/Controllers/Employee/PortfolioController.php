<?php

namespace App\Http\Controllers\Employee;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    public function index($view){
        
        $users = User::all();

        if($view === 'card'){
            return view('employee.portfolio.card', compact('users'));
        }else{
            return view('employee.portfolio.list', compact('users'));
        }

    }
}
