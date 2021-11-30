<?php

namespace App\View\Components;

use App\MedicalRecord;
use Illuminate\View\Component;

class Hospitalization extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
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
        $record = MedicalRecord::where('id','=',auth()->user()->id)->with('hospitalizations')->first();
        return view('components.hospitalization', compact('record'));
    }
}
