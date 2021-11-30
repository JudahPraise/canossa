<?php

namespace App\View\Components;

use App\LabTest;
use App\MedicalRecord;
use Illuminate\View\Component;

class LabtestFile extends Component
{
   
    
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $record = MedicalRecord::where('id','=',auth()->user()->id)->with('labtests')->get();
        return view('components.lab-test', compact('record'));
    }
}
