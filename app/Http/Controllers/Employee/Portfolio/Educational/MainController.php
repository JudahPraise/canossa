<?php

namespace App\Http\Controllers\Employee\Portfolio\Educational;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index($view)
    {
        if($view === 'card'){
            return view('employee.portfolio.educational-background.card');
        }else{
            return view('employee.portfolio.educational-background.list');
        }
    }

}
