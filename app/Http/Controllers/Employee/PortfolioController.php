<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index($view){

        if($view === 'card'){
            return view('employee.portfolio.card');
        }else{
            return view('employee.portfolio.list');
        }

    }
}
