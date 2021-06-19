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
        if($view === 'card'){
            return view('employee.portfolio.family-background.card');
        }else{
            return view('employee.portfolio.family-background.list');
        }
    }

    public function show($id){
        $family = Family::where('user_id','=',Auth::user()->id)->with('spouse', 'father', 'mother')->first();
        $children = Children::where('family_id','=',Auth::user()->family->id)->get();

        return view('employee.portfolio.family-background.show',  compact('family', 'children'));
    }
}
