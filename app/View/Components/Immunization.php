<?php

namespace App\View\Components;

use App\MedicalRecord;
use Illuminate\View\Component;

class Immunization extends Component
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
        $record = MedicalRecord::where('id','=',auth()->user()->id)->with('immunizations')->first();
        return view('components.immunization', compact('record'));
    }
}
