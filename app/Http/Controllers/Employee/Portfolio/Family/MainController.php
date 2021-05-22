<?php

namespace App\Http\Controllers\Employee\Portfolio\Family;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{

    public function index($view)
    {
        if($view === 'card'){
            return view('employee.portfolio.family-background.card');
        }else{
            return view('employee.portfolio.family-background.list');
        }
    }
}
