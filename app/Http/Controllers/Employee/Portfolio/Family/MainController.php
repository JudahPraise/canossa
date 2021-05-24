<?php

namespace App\Http\Controllers\Employee\Portfolio\Family;

use App\Family;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

    public function index($view)
    {
        $family = Family::where('user_id','=',Auth::user()->id)->with('spouse', 'children', 'father', 'mother')->first();
        if($view === 'card'){
            return view('employee.portfolio.family-background.card', compact('family', $family));
        }else{
            return view('employee.portfolio.family-background.list', compact('family', $family));
        }
    }
}
