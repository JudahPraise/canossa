<?php

namespace App\Http\Controllers\Employee\Portfolio\Educational;

use Illuminate\Http\Request;
use App\EducationalBackground;
use App\Http\Controllers\Controller;

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

    public function show($id)
    {

        $education = EducationalBackground::where('user_id','=',$id)->with('elem', 'sec', 'col', 'grad')->first();
        return view('employee.portfolio.educational-background.show', compact('education'));

    }

}
