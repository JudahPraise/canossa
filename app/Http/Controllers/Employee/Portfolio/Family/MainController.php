<?php

namespace App\Http\Controllers\Employee\Portfolio\Family;

use App\Family;
use App\Children;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

    public function index($view)
    {   
        $family = Family::where('user_id','=',Auth::user()->id)->with('spouse', 'father', 'mother')->first();
        $children = Children::where('family_id','=',Auth::user()->family->id)->paginate(2);
        if($view === 'card'){
            return view('employee.portfolio.family-background.card', compact('family', 'children'));
        }else{
            return view('employee.portfolio.family-background.list', compact('family', 'children'));
        }
    }
}
