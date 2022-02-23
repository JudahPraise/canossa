<?php

namespace App\View\Components;

use App\MedicalRecord;
use Illuminate\View\Component;

class MedicalHistory extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
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
        $record = MedicalRecord::where('user_id','=',$this->id)->with('history')->first();
        return view('components.medical-history', compact('record'));
    }
}
