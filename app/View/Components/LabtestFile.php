<?php

namespace App\View\Components;

use App\LabTest;
use App\MedicalRecord;
use Illuminate\View\Component;

class LabtestFile extends Component
{
    public $id;
    
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $record = MedicalRecord::where('user_id','=',$this->id)->with('labtests')->first();
        // dd($record->labtests);
        return view('components.lab-test', compact('record'));
    }
}
