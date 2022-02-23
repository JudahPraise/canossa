<?php

namespace App\View\Components;

use App\MedicalRecord;
use Illuminate\View\Component;

class MedicalCreateNav extends Component
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
        $record = MedicalRecord::select('user_id')->where('user_id','=',$this->id)->first();
        return view('components.medical-create-nav', compact('record'));
    }
}
